<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Data\Casts\LinearDate;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
use Illuminate\Support\Collection;
use PhpParser\Comment\Doc;
use PhpParser\Node\Attribute;
use PhpParser\Node\AttributeGroup;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\UnionType;
use PhpParser\NodeAbstract;
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
		
		return $this->param;
	}
	
	protected function listType(ListTypeNode $node, bool $nullable): NodeAbstract
	{
		$type = $this->typeToName($node->type);
		$this->param->setDocComment(new Doc("/** @var Collection<int, {$type}> */"));
		$this->parent->use(Collection::class);
		
		return new UnionType(array_filter([
			new Name('Optional'),
			new Name('Collection'),
			$nullable ? new Identifier('null') : null,
		]));
	}
	
	protected function namedType(NamedTypeNode $node, bool $nullable = false): NodeAbstract
	{
		if ('DateTime' === $node->name->value) {
			$this->param->attrGroups ??= [];
			$this->param->attrGroups[] = new AttributeGroup([new Attribute($this->fqcn(LinearDate::class))]);
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
