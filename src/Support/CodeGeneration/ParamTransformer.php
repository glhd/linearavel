<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use DateTimeInterface;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\NonNullTypeNode;
use Illuminate\Support\Collection;
use PhpParser\Comment\Doc;
use PhpParser\Node\Arg;
use PhpParser\Node\Attribute;
use PhpParser\Node\AttributeGroup;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\UnionType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Optional;

class ParamTransformer
{
	protected Param $param;
	
	public static function transform(
		FieldDefinitionNode $node,
		ClassTransformer $parent
	) {
		$transformer = new static($node, $parent);
		return $transformer();
	}
	
	public function __construct(
		protected FieldDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
		$this->param = new Param(
			var: new Variable($this->node->name->value),
			flags: 1,
		);
	}
	
	public function __invoke()
	{
		$this->param->type = $this->nodeType($this->node->type);
		
		return $this->param;
	}
	
	protected function nodeType(NamedTypeNode|ListTypeNode|NonNullTypeNode $node, bool $nullable = true)
	{
		return match ($node::class) {
			NamedTypeNode::class => $this->namedType($node, $nullable),
			NonNullTypeNode::class => $this->nodeType($node->type, false),
			ListTypeNode::class => $this->listType($node),
		};
	}
	
	protected function listType(ListTypeNode $node): UnionType
	{
		$type = $this->typeToName($node->type);
		$this->param->setDocComment(new Doc("/** @var Collection<int, {$type}> */"));
		$this->parent->use(Collection::class);
		
		$types = [
			new Name('Optional'),
			new Name('Collection'),
		];
		
		return new UnionType($types);
	}
	
	protected function namedType(NamedTypeNode $node, bool $nullable = false): UnionType
	{
		$this->parent->use(Optional::class);
		
		$type = $this->typeToName($node);
		
		if ('DateTime' === $node->name->value) {
			$this->param->attrGroups ??= [];
			$this->param->attrGroups[] = new AttributeGroup([
				new Attribute($this->fqcn(WithCast::class), [
					new Arg(new ClassConstFetch($this->fqcn(DateTimeInterfaceCast::class), new Identifier('class'))),
					new Arg(new ClassConstFetch($this->fqcn(DateTimeInterface::class), new Identifier('RFC3339_EXTENDED'))),
				]),
			]);
		}
		
		$types = [
			new Name('Optional'),
			$type,
		];
		
		if ($nullable) {
			$types[] = new Identifier('null');
		}
		
		return new UnionType($types);
	}
	
	protected function typeToName(NamedTypeNode|NonNullTypeNode $node): Identifier|Name
	{
		if ($node instanceof NonNullTypeNode) {
			return $this->typeToName($node->type);
		}
		
		return match ($node->name->value) {
			'Boolean' => new Identifier('bool'),
			'Float' => new Identifier('float'),
			'Int' => new Identifier('int'),
			'String', 'ID' => new Identifier('string'),
			'DateTime' => $this->fqcn('Carbon\CarbonImmutable'),
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
	
	protected function fqcn(string $fqcn): Name
	{
		$this->parent->use($fqcn);
		return new Name(class_basename($fqcn));
	}
}
