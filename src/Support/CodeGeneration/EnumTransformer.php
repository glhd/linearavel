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

class EnumTransformer
{
	public static function transform(
		EnumTypeDefinitionNode $node,
		string $namespace,
	) {
		$transformer = new static($node, $namespace);
		return $transformer();
	}
	
	public function __construct(
		protected EnumTypeDefinitionNode $node,
		public string $namespace,
	) {
	}
	
	public function __invoke()
	{
		return [
			new Namespace_(new Name($this->namespace.'Data\\Enums')),
			new Enum_($this->node->name->value, [
				'scalarType' => new Identifier('string'),
				'stmts' => collect($this->node->values)
					->map(function(EnumValueDefinitionNode $node) {
						return (new EnumCase($node->name->value, new String_($node->name->value)));
					})
					->all(),
			]),
		];
	}
}
