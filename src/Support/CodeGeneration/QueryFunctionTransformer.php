<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Requests\PendingLinearRequest;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InputValueDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
use PhpParser\Node\Param;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Return_;
use PhpParser\NodeAbstract;

class QueryFunctionTransformer extends FunctionTransformer
{
	public static function transform(
		FieldDefinitionNode $node,
		ClassTransformer $parent,
	) {
		$transformer = new static($node, $parent);
		return $transformer();
	}
	
	public function __construct(
		protected FieldDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
	}
	
	public function __invoke(): ClassMethod
	{
		$this->method = new ClassMethod($this->node->name->value);
		
		$args = collect($this->node->arguments)
			->map(fn(InputValueDefinitionNode $arg) => FunctionParamTransformer::transform($arg, $this->parent, $this))
			->sortBy(fn(Param $param) => $param->type instanceof NullableType
				? 1
				: 0)
			->values()
			->all();
		
		$this->method->params = $args;
		
		$returns = $this->getUnderlyingType($this->node->type);
		$this->documentReturn("PendingLinearRequest<{$returns->name}>");
		$this->method->returnType = $this->fqcn(PendingLinearRequest::class);
		
		$this->method->stmts = [
			new Return_(
				new MethodCall(
					var: new Variable('this'),
					name: new Identifier('linearQuery'),
					args: array_filter([
						new Arg(new String_($this->method->name->name)),
						new Arg(new ClassConstFetch($returns, 'class')),
						new Arg(new ConstFetch(new Name($this->isList($this->node->type) ? 'true' : 'false'))),
						count($this->method->params)
							? new Arg(new FuncCall(
							name: new Name('compact'),
							args: collect($this->method->params)
								->map(fn(Param $param) => new Arg(new String_((string) $param->var->name)))
								->all(),
						))
							: null,
					]),
				),
			),
		];
		
		if ($doc = $this->doc()) {
			$this->method->setDocComment($doc);
		}
		
		return $this->method;
	}
	
	protected function listType(ListTypeNode $node, bool $nullable): NodeAbstract
	{
		// $type = $this->typeToName($node->type);
		// $this->param->setDocComment(new Doc("/** @var {$type}[]|Collection<int, {$type}> */"));
		return $nullable
			? new NullableType(new Name('iterable'))
			: new Name('iterable');
	}
}
