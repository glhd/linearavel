<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use DateTimeInterface;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\NonNullTypeNode;
use GraphQL\Language\AST\TypeNode;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
use PhpParser\Node\Param;
use PhpParser\Node\UnionType;
use PhpParser\NodeAbstract;

abstract class ParamTransformer
{
	use HasTypeNodes;
	use HasParent;
	
	protected ?FunctionTransformer $function = null;
	
	public static function acceptsNull(Node $node): bool
	{
		if ($node instanceof NullableType) {
			return true;
		}
		
		if ($node instanceof UnionType) {
			return collect($node->types)
				->contains(fn ($type) => $type instanceof Identifier && 'null' === $type->name);
		}
		
		return false;
	}
	
	abstract public function __invoke(): Param;
}
