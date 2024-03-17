<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Requests\LinearRequest;
use GraphQL\Language\AST\InputObjectTypeDefinitionNode;
use GraphQL\Language\AST\InputValueDefinitionNode;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Namespace_;

class InputTransformer extends ClassTransformer
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
		// $this->use(LinearRequest::class);
	}
	
	public function __invoke(): array
	{
		// Generate the data first, since they may push items into `$uses`
		$params = $this->params();
		
		return array_filter([
			new Namespace_(new Name($this->namespace.'Requests\\Inputs')),
			$this->uses(),
			new Class_($this->node->name->value, [
				'stmts' => [new ClassMethod('__construct', ['params' => $params])],
				// 'extends' => new Name(class_basename(LinearRequest::class)),
			]),
		]);
	}
	
	protected function params(): array
	{
		return collect($this->node->fields)
			->map(fn (InputValueDefinitionNode $node) => ConstructorParamTransformer::transform($node, $this))
			->sortBy(fn (Param $param) => ParamTransformer::acceptsNull($param->type) ? 1 : 0)
			->all();
	}
}
