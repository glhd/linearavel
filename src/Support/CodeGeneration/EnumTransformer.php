<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\EnumValueDefinitionNode;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Enum_;
use PhpParser\Node\Stmt\EnumCase;
use PhpParser\Node\Stmt\Namespace_;

class EnumTransformer extends InvokableTransformer
{
	public function __construct(
		protected EnumTypeDefinitionNode $node,
		public string $namespace,
	) {
	}
	
	public function __invoke(PendingTransformationQueue $queue): void
	{
		$queue->addFromNode($this->node, [
			new Namespace_(new Name($this->namespace.'Data\\Enums')),
			new Enum_($this->node->name->value, [
				'scalarType' => new Identifier('string'),
				'stmts' => collect($this->node->values)
					->map(function(EnumValueDefinitionNode $node) {
						return (new EnumCase($node->name->value, new String_($node->name->value)));
					})
					->all(),
			]),
		]);
	}
}
