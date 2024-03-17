<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use DateTimeInterface;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InputValueDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Type\Definition\NullableType;
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

class FunctionParamTransformer extends ParamTransformer
{
	protected Param $param;
	
	public static function transform(
		FieldDefinitionNode|InputValueDefinitionNode $node,
		ClassTransformer $parent,
	): Param {
		$transformer = new static($node, $parent);
		return $transformer();
	}
	
	public function __construct(
		protected FieldDefinitionNode|InputValueDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
	}
	
	public function __invoke(): Param
	{
		$this->param = new Param(
			var: new Variable($this->node->name->value),
		);
		
		$this->param->type = $this->nodeType($this->node->type);
		
		if ($this->param->type instanceof NullableType) {
			$this->param->default = new ConstFetch(new Name('null'));
		}
		
		return $this->param;
	}
	
	protected function listType(ListTypeNode $node): NodeAbstract
	{
		return new Name('array');
	}
	
	protected function namedType(NamedTypeNode $node, bool $nullable = false): NodeAbstract
	{
		return parent::namedType($node, $nullable);
		
		// if ('DateTime' === $node->name->value) {
		// 	$this->param->attrGroups ??= [];
		// 	$this->param->attrGroups[] = new AttributeGroup([
		// 		new Attribute($this->fqcn(WithCast::class), [
		// 			new Arg(new ClassConstFetch($this->fqcn(DateTimeInterfaceCast::class), new Identifier('class'))),
		// 			new Arg(new ClassConstFetch($this->fqcn(DateTimeInterface::class), new Identifier('RFC3339_EXTENDED'))),
		// 		]),
		// 	]);
		// }
		//
		// $this->parent->use(Optional::class);
		//
		// $types = [
		// 	new Name('Optional'),
		// 	$this->typeToName($node),
		// ];
		//
		// if ($nullable) {
		// 	$types[] = new Identifier('null');
		// }
		//
		// return new UnionType($types);
	}
}
