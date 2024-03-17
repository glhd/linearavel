<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use DateTimeInterface;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\NonNullTypeNode;
use GraphQL\Language\AST\TypeNode;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
use PhpParser\NodeAbstract;

trait HasParent
{
	protected ClassTransformer $parent;
	
	protected function fqcn(string $fqcn): Name
	{
		$this->parent->use($fqcn);
		
		return new Name(class_basename($fqcn));
	}
}
