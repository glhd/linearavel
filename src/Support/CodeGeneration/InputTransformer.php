<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\InputObjectTypeDefinitionNode;
use GraphQL\Language\AST\InputValueDefinitionNode;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Namespace_;

class InputTransformer extends ClassTransformer
{
	protected array $uses = [];
	
	public function __construct(
		protected InputObjectTypeDefinitionNode $node,
		public Transformer $parent,
	) {
	}
	
	public function __invoke(WriteQueue $queue): void
	{
		// Generate the data first, since they may push items into `$uses`
		$params = $this->params();
		
		$queue->addFromNode($this->node, array_filter([
			new Namespace_(new Name(Taxonomy::ns('Requests\\Inputs'))),
			$this->uses(),
			new Class_($this->node->name->value, [
				'stmts' => [new ClassMethod('__construct', ['params' => $params])],
			], [
				'comments' => DocBlock::make()->seeDocs("inputs/{$this->node->name->value}")->asAttribute(),
			]),
		]));
	}
	
	protected function params(): array
	{
		return collect($this->node->fields)
			->map(fn(InputValueDefinitionNode $node) => InputParamTransformer::transform($node, $this))
			->sortBy(fn(Param $param) => ParamTransformer::acceptsNull($param->type) ? 1 : 0)
			->values()
			->all();
	}
}
