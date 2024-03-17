<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InputValueDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
use PhpParser\Node\Param;
use PhpParser\NodeAbstract;
use PhpParser\PrettyPrinter\Standard;

class FunctionParamTransformer extends ParamTransformer
{
	protected Param $param;
	
	public static function transform(
		FieldDefinitionNode|InputValueDefinitionNode $node,
		ClassTransformer $parent,
		?FunctionTransformer $function = null,
	): Param {
		$transformer = new static($node, $parent, $function);
		return $transformer();
	}
	
	public function __construct(
		protected FieldDefinitionNode|InputValueDefinitionNode $node,
		protected ClassTransformer $parent,
		protected ?FunctionTransformer $function,
	) {
	}
	
	public function __invoke(): Param
	{
		$this->param = new Param(
			var: new Variable($this->node->name->value),
		);
		
		$this->param->type = $this->nodeType($this->node->type);
		
		if (static::acceptsNull($this->param->type)) {
			$this->param->default = new ConstFetch(new Name('null'));
		}
		
		$this->function?->documentParam(
			name: $this->node->name->value,
			type: (new Standard())->prettyPrint([$this->param->type]),
			description: $this->node->description?->value ?? '',
		);
		
		return $this->param;
	}
	
	protected function listType(ListTypeNode $node): NodeAbstract
	{
		// $type = $this->typeToName($node->type);
		// $this->param->setDocComment(new Doc("/** @var {$type}[]|Collection<int, {$type}> */"));
		return new Name('iterable');
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
