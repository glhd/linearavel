<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Trait_;

class MutationTransformer extends ClassTransformer
{
	public string $namespace;
	
	public function __construct(
		protected ObjectTypeDefinitionNode $node,
		public Transformer $parent,
	) {
		$this->namespace = $this->parent->namespace;
	}
	
	public function __invoke(): array
	{
		// Generate the data first, since they may push items into `$uses`
		$queries = $this->mutations();
		
		return array_filter([
			new Namespace_(new Name($this->namespace.'Connectors')),
			$this->uses(),
			new Trait_('MutatesLinear', [
				'stmts' => $queries,
			]),
		]);
	}
	
	protected function mutations(): array
	{
		return collect($this->node->fields)
			->map(fn(FieldDefinitionNode $node) => MutationFunctionTransformer::transform($node, $this))
			->all();
	}
}
