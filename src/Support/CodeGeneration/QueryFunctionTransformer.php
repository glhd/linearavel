<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Requests\PendingLinearListRequest;
use Glhd\Linearavel\Requests\PendingLinearObjectRequest;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InputValueDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ClassConstFetch;
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
	public function __construct(
		protected FieldDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
	}
	
	public function __invoke(PendingTransformationQueue $queue): ClassMethod
	{
		$this->method = new ClassMethod($this->node->name->value);
		
		$this->method->params = collect($this->node->arguments)
			->map(fn(InputValueDefinitionNode $arg) => FunctionParamTransformer::transform($arg, $this->parent, $this))
			->sortBy(fn(Param $param) => $param->type instanceof NullableType ? 1 : 0)
			->values()
			->all();
		
		$type = $this->getUnderlyingType($this->node->type);
		
		$returns = $this->isList($this->node->type)
			? $this->fqcn(PendingLinearListRequest::class)->name
			: $this->fqcn(PendingLinearObjectRequest::class)->name;
		
		$this->documentReturn("{$returns}<{$type->name}>");
		
		// Create the typed request and response objects (this had been done using generics,
		// but implementing concrete classes allows for better IDE support in a few ways)
		PendingRequestTransformer::transform('Queries', $this->node, $this->parent);
		ResponseTransformer::transform('Queries', $this->node, $this->parent);
		
		$this->method->stmts = [
			new Return_(
				new MethodCall(
					var: new Variable('this'),
					name: $this->isList($this->node->type)
						? new Identifier('linearListQuery')
						: new Identifier('linearObjectQuery'),
					args: array_filter([
						new Arg(new String_($this->method->name->name)),
						new Arg(new ClassConstFetch($type, 'class')),
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
		
		$this->method->setDocComment($this->doc());
		
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
