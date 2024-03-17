<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\ListTypeNode;
use Illuminate\Support\Collection;
use PhpParser\Comment\Doc;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\UnionType;
use PhpParser\NodeAbstract;

class ConstructorParamTransformer extends ParamTransformer
{
	protected Param $param;
	
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
}
