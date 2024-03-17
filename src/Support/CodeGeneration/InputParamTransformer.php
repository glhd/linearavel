<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use DateTimeInterface;
use GraphQL\Language\AST\InputValueDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use Illuminate\Support\Collection;
use PhpParser\Comment\Doc;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
use PhpParser\Node\Param;
use PhpParser\NodeAbstract;

class InputParamTransformer extends ConstructorParamTransformer
{
	protected Param $param;
	
	public static function transform(
		InputValueDefinitionNode $node,
		ClassTransformer $parent,
	): Param {
		$transformer = new static($node, $parent);
		return $transformer();
	}
	
	public function __construct(
		protected InputValueDefinitionNode $node,
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
	
	protected function listType(ListTypeNode $node, bool $nullable): NodeAbstract
	{
		$type = $this->typeToName($node->type);
		$this->param->setDocComment(new Doc("/** @var iterable<{$type}>|Collection<int, {$type}> */"));
		$this->parent->use(Collection::class);
		
		return $nullable
			? new NullableType(new Name('iterable'))
			: new Name('iterable');
	}
}
