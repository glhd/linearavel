<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

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
	public string $namespace;
	
	public static function transform(
		ObjectTypeDefinitionNode $node,
		Transformer $parent,
	) {
		$transformer = new static($node, $parent);
		return $transformer();
	}
	
	public function __construct(
		protected ObjectTypeDefinitionNode $node,
		public Transformer $parent,
	) {
		$this->namespace = $this->parent->namespace;
		$this->use(Data::class);
	}
	
	public function __invoke(): array
	{
		// Generate the data first, since they may push items into `$uses`
		$params = $this->params();
		$implements = $this->implements();
		
		return array_filter([
			new Namespace_(new Name($this->namespace.'Data')),
			$this->uses(),
			new Class_($this->node->name->value, [
				'stmts' => [new ClassMethod('__construct', ['params' => $params])],
				'extends' => new Name('Data'),
				'implements' => $implements,
			]),
		]);
	}
	
	protected function params(): array
	{
		return collect($this->node->fields)
			->map(fn (FieldDefinitionNode $node) => DataParamTransformer::transform($node, $this))
			->sortBy(fn (Param $param) => ParamTransformer::acceptsNull($param->type) ? 1 : 0)
			->all();
	}
	
	protected function implements(): array
	{
		return collect($this->node->interfaces)
			->map(function(NamedTypeNode $node) {
				$fqcn = $this->namespace.'Data\\Contracts\\'.$node->name->value;
				$this->use($fqcn);
				
				return new Name($node->name->value);
			})
			->all();
	}
}