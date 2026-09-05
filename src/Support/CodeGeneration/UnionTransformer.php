<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\UnionTypeDefinitionNode;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Namespace_;

/**
 * GraphQL unions become marker interfaces that each member type implements, so
 * that a union-typed field can be resolved to a concrete data object.
 */
class UnionTransformer extends InvokableTransformer
{
	public function __construct(
		protected UnionTypeDefinitionNode $node,
	) {
	}

	public function __invoke(WriteQueue $queue)
	{
		$taxonomy = Taxonomy::make($this->node);

		$queue->addFromNode($this->node, [
			new Namespace_(new Name(Taxonomy::ns('Data\\Contracts'))),
			new Interface_((string) $taxonomy->name, attributes: [
				'comments' => DocBlock::make()->seeDocs("unions/{$taxonomy->graphql_name}")->asAttribute(),
			]),
		]);
	}
}
