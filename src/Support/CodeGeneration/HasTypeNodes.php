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

trait HasTypeNodes
{
	use HasParent;
	
	protected function getUnderlyingType(TypeNode $node): NodeAbstract
	{
		$type = $node;
		
		while (! ($type instanceof NamedTypeNode)) {
			$type = $type->type;
		}
		
		return $this->namedType($type);
	}
	
	protected function isList(TypeNode $node): bool
	{
		if ($node instanceof NonNullTypeNode) {
			$node = $node->type;
		}
		
		return $node instanceof ListTypeNode;
	}
	
	protected function nodeType(TypeNode $node, bool $nullable = true)
	{
		return match ($node::class) {
			NamedTypeNode::class => $this->namedType($node, $nullable),
			NonNullTypeNode::class => $this->nodeType($node->type, false),
			ListTypeNode::class => $this->listType($node, $nullable),
		};
	}
	
	protected function listType(ListTypeNode $node, bool $nullable): NodeAbstract
	{
		return $nullable
			? new NullableType(new Name('array'))
			: new Name('array');
	}
	
	protected function dateTimeType(): Name
	{
		return $this->fqcn(DateTimeInterface::class);
	}
	
	protected function typeToName(NamedTypeNode|NonNullTypeNode $node): NodeAbstract
	{
		if ($node instanceof NonNullTypeNode) {
			return $this->typeToName($node->type);
		}
		
		return match ($node->name->value) {
			'Boolean' => new Identifier('bool'),
			'Float' => new Identifier('float'),
			'Int' => new Identifier('int'),
			'String', 'ID' => new Identifier('string'),
			'DateTime' => $this->dateTimeType(),
			default => value(function() use ($node) {
				// Treat all scalars as strings for now
				if ($this->parent->parent->scalars->has($node->name->value)) {
					return new Identifier('string');
				}
				
				return $this->fqcn(
					$this->parent->parent->registry->get($node->name->value) ?? $this->parent->namespace.'Data\\'.$node->name->value
				);
			}),
		};
	}
	
	protected function namedType(NamedTypeNode $node, bool $nullable = false): NodeAbstract
	{
		$type = $this->typeToName($node);
		
		return $nullable
			? new NullableType($type)
			: $type;
	}
}
