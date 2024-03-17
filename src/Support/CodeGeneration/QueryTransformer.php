<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Trait_;

class QueryTransformer extends ClassTransformer
{
	public string $namespace;
	
	public function __construct(
		protected ObjectTypeDefinitionNode $node,
		public Transformer $parent,
	) {
		$this->namespace = $this->parent->namespace;
		// $this->use(Data::class);
	}
	
	public function __invoke(): array
	{
		// Generate the data first, since they may push items into `$uses`
		$queries = $this->queries();
		
		return array_filter([
			new Namespace_(new Name($this->namespace.'Connectors')),
			$this->uses(),
			new Trait_('QueriesLinear', [
				'stmts' => $queries,
			]),
		]);
	}
	
	protected function queries(): array
	{
		return collect($this->node->fields)
			->map(fn(FieldDefinitionNode $node) => QueryFunctionTransformer::transform($node, $this, function(ClassMethod $fn) {
			}))
			->all();
	}
}
