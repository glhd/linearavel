<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Use_;
use PhpParser\Node\UseItem;
use Spatie\LaravelData\Data;

class InterfaceTransformer
{
	public static function transform(
		InterfaceTypeDefinitionNode $node,
		string $namespace,
	) {
		$transformer = new static($node, $namespace);
		return $transformer();
	}
	
	public function __construct(
		protected InterfaceTypeDefinitionNode $node,
		public string $namespace,
	) {
	}
	
	public function __invoke()
	{
		return [
			new Namespace_(new Name($this->namespace.'Data\\Contracts')),
			new Interface_($this->node->name->value),
		];
	}
}
