<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Data\Wrappers\Connection;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Namespace_;
use Spatie\LaravelData\Data;

class TypeTransformer extends ClassTransformer
{
	use HasTypeNodes;
	
	public function __construct(
		protected ObjectTypeDefinitionNode $node,
		public Transformer $parent,
	) {
		$this->use(Data::class);
	}
	
	public function __invoke(WriteQueue $queue): void
	{
		$taxonomy = Taxonomy::make($this->node);
		
		// Generate the data first, since they may push items into `$uses`
		$params = $this->params();
		$extends = $this->extends();
		$implements = $this->implements();
		$docblock = new DocBlock();
		
		if (str_ends_with($this->node->name->value, 'Connection')) {
			/** @var FieldDefinitionNode $node */
			$node = collect($this->node->fields)
				->filter(fn(FieldDefinitionNode $node) => $node->name->value === 'nodes')
				->first();
			
			$type = $this->getUnderlyingType($node->type);
			
			$docblock->extends('Connection', $type->name);
		}
		
		$docblock->seeDocs("objects/{$taxonomy->graphql_name}");
		
		if ($taxonomy->renamed()) {
			$docblock->note("Named for the GraphQL type `{$taxonomy->graphql_name}`.");
		}
		
		$queue->addFromNode($this->node, array_filter([
			new Namespace_(new Name(Taxonomy::ns('Data'))),
			$this->uses(),
			new Class_((string) $taxonomy->name, [
				'stmts' => [new ClassMethod('__construct', ['params' => $params, 'flags' => 1])],
				'extends' => $extends,
				'implements' => $implements,
			], ['comments' => $docblock->asAttribute()]),
		]));
	}
	
	protected function fqcn(string $fqcn): Name
	{
		$this->use($fqcn);
		
		return new Name(class_basename($fqcn));
	}
	
	protected function params(): array
	{
		return collect($this->node->fields)
			->map(fn(FieldDefinitionNode $node) => DataParamTransformer::transform($node, $this))
			->sortBy(fn(Param $param) => ParamTransformer::acceptsNull($param->type) ? 1 : 0)
			->values()
			->all();
	}
	
	protected function extends(): Name
	{
		$extends = str_ends_with($this->node->name->value, 'Connection')
			? Connection::class
			: Data::class;
		
		$this->use($extends);
		
		return new Name(class_basename($extends));
	}
	
	protected function implements(): array
	{
		$contracts = collect($this->node->interfaces)
			->map(fn(NamedTypeNode $node) => (string) Taxonomy::make($node)->contract());
		
		// Union members implement a marker interface for each union they belong to
		$contracts = $contracts->merge(
			collect($this->parent->unionsFor($this->node->name->value))
				->map(fn(string $union) => (string) Taxonomy::make($union)->contract())
		);
		
		return $contracts
			->unique()
			->map(function(string $contract) {
				$this->use($contract);
				
				return new Name(class_basename($contract));
			})
			->values()
			->all();
	}
}
