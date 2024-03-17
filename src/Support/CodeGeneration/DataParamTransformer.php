<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use DateTimeInterface;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
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
use PhpParser\Node\Param;
use PhpParser\Node\UnionType;
use PhpParser\NodeAbstract;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Optional;

class DataParamTransformer extends ConstructorParamTransformer
{
	protected Param $param;
	
	public static function transform(
		FieldDefinitionNode $node,
		ClassTransformer $parent,
	): Param {
		$transformer = new static($node, $parent);
		return $transformer();
	}
	
	public function __construct(
		protected FieldDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
	}
	
	public function __invoke(): Param
	{
		$this->param = new Param(
			var: new Variable($this->node->name->value),
			flags: 1,
		);
		
		$this->param->type = $this->nodeType($this->node->type);
		
		if (static::acceptsNull($this->param->type)) {
			$this->param->default = new ConstFetch(new Name('null'));
		}
		
		return $this->param;
	}
	
	protected function listType(ListTypeNode $node): UnionType|Name
	{
		$type = $this->typeToName($node->type);
		$this->param->setDocComment(new Doc("/** @var Collection<int, {$type}> */"));
		$this->parent->use(Collection::class);
		
		return new UnionType([
			new Name('Optional'),
			new Name('Collection'),
		]);
	}
	
	protected function namedType(NamedTypeNode $node, bool $nullable = false): NodeAbstract
	{
		if ('DateTime' === $node->name->value) {
			$this->param->attrGroups ??= [];
			$this->param->attrGroups[] = new AttributeGroup([
				new Attribute($this->fqcn(WithCast::class), [
					new Arg(new ClassConstFetch($this->fqcn(DateTimeInterfaceCast::class), new Identifier('class'))),
					new Arg(new ClassConstFetch($this->fqcn(DateTimeInterface::class), new Identifier('RFC3339_EXTENDED'))),
				]),
			]);
		}
		
		$this->parent->use(Optional::class);
		
		$types = [
			new Name('Optional'),
			$this->typeToName($node),
		];
		
		if ($nullable) {
			$types[] = new Identifier('null');
		}
		
		return new UnionType($types);
	}
}
