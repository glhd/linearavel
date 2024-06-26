<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Trait_;

class QueryTransformer extends ClassTransformer
{
	public function __construct(
		protected ObjectTypeDefinitionNode $node,
		public Transformer $parent,
	) {
	}
	
	public function __invoke(WriteQueue $queue): void
	{
		// Generate the data first, since they may push items into `$uses`
		$queries = $this->queries();
		
		$queue->addFromNode($this->node, array_filter([
			new Namespace_(new Name(Taxonomy::ns('Connectors'))),
			$this->uses(),
			new Trait_('QueriesLinear', [
				'stmts' => $queries,
			]),
		]));
	}
	
	protected function queries(): array
	{
		return collect($this->node->fields)
			->map(fn(FieldDefinitionNode $node) => QueryFunctionTransformer::transform($node, $this))
			->all();
	}
}
