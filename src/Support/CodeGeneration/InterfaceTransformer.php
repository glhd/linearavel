<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Namespace_;

class InterfaceTransformer extends InvokableTransformer
{
	public function __construct(
		protected InterfaceTypeDefinitionNode $node,
		public string $namespace,
	) {
	}
	
	public function __invoke(PendingTransformationQueue $queue)
	{
		$queue->addFromNode($this->node, [
			new Namespace_(new Name($this->namespace.'Data\\Contracts')),
			new Interface_($this->node->name->value),
		]);
	}
}
