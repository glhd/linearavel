<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Data\Wrappers\Connection;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use PhpParser\Comment\Doc;
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
		// Generate the data first, since they may push items into `$uses`
		$params = $this->params();
		$extends = $this->extends();
		$implements = $this->implements();
		$attributes = [];
		
		if (str_ends_with($this->node->name->value, 'Connection')) {
			/** @var FieldDefinitionNode $node */
			$node = collect($this->node->fields)
				->filter(fn(FieldDefinitionNode $node) => $node->name->value === 'nodes')
				->first();
			
			$type = $this->getUnderlyingType($node->type);
			
			$attributes['comments'] = [new Doc("/** @extends Connection<{$type->name}> */")];
		}
		
		$queue->addFromNode($this->node, array_filter([
			new Namespace_(new Name(Taxonomy::ns('Data'))),
			$this->uses(),
			new Class_($this->node->name->value, [
				'stmts' => [new ClassMethod('__construct', ['params' => $params, 'flags' => 1])],
				'extends' => $extends,
				'implements' => $implements,
			], $attributes),
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
		return collect($this->node->interfaces)
			->map(function(NamedTypeNode $node) {
				$this->use((string) Taxonomy::make($node)->contract());
				
				return new Name($node->name->value);
			})
			->all();
	}
}
