<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use DateTimeInterface;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InputValueDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\NonNullTypeNode;
use GraphQL\Language\AST\TypeNode;
use Illuminate\Support\Collection;
use PhpParser\Comment\Doc;
use PhpParser\Node\Arg;
use PhpParser\Node\Attribute;
use PhpParser\Node\AttributeGroup;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
use PhpParser\Node\Param;
use PhpParser\Node\UnionType;
use PhpParser\NodeAbstract;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Optional;

abstract class ParamTransformer
{
	protected ClassTransformer $parent;
	
	abstract public function __invoke(): Param;
	
	protected function nodeType(TypeNode $node, bool $nullable = true)
	{
		return match ($node::class) {
			NamedTypeNode::class => $this->namedType($node, $nullable),
			NonNullTypeNode::class => $this->nodeType($node->type, false),
			ListTypeNode::class => $this->listType($node),
		};
	}
	
	protected function listType(ListTypeNode $node): NodeAbstract
	{
		return new Name('array');
	}
	
	protected function namedType(NamedTypeNode $node, bool $nullable = false): NodeAbstract
	{
		$type = $this->typeToName($node);
		
		return $nullable
			? new NullableType($type)
			: $type;
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
	
	protected function dateTimeType(): Name
	{
		return $this->fqcn('Carbon\CarbonImmutable');
	}
	
	protected function fqcn(string $fqcn): Name
	{
		$this->parent->use($fqcn);
		
		return new Name(class_basename($fqcn));
	}
}
