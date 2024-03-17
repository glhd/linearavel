<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Requests\LinearRequest;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InputObjectTypeDefinitionNode;
use GraphQL\Language\AST\InputValueDefinitionNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Use_;
use PhpParser\Node\UseItem;
use Spatie\LaravelData\Data;

class InputTransformer
{
	public string $namespace;
	
	protected array $uses = [];
	
	public static function transform(
		InputObjectTypeDefinitionNode $node,
		Transformer $parent,
	) {
		$transformer = new static($node, $parent);
		return $transformer();
	}
	
	public function __construct(
		protected InputObjectTypeDefinitionNode $node,
		public Transformer $parent,
	) {
		$this->namespace = $this->parent->namespace;
		$this->use(LinearRequest::class);
	}
	
	public function use(string $fqcn): static
	{
		$this->uses[] = $fqcn;
		
		return $this;
	}
	
	public function __invoke(): array
	{
		// Generate the data first, since they may push items into `$uses`
		$params = $this->params();
		
		return array_filter([
			new Namespace_(new Name($this->namespace.'Requests')),
			$this->uses(),
			new Class_($this->node->name->value, [
				'stmts' => [new ClassMethod('__construct', ['params' => $params])],
				'extends' => new Name(class_basename(LinearRequest::class)),
			]),
		]);
	}
	
	protected function uses(): ?Use_
	{
		if (! count($this->uses)) {
			return null;
		}
		
		$uses = collect($this->uses)
			->unique()
			->map(fn($fqcn) => new UseItem(new Name($fqcn)))
			->all();
		
		return new Use_($uses);
	}
	
	protected function params(): array
	{
		return collect($this->node->fields)
			->map(fn(InputValueDefinitionNode $node) => ParamTransformer::transform($node, $this))
			->all();
	}
}
