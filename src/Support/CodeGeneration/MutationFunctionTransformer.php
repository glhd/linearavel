<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InputValueDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use PhpParser\Node\Arg;
use PhpParser\Node\ArrayItem;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
use PhpParser\Node\Param;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Return_;
use PhpParser\NodeAbstract;

class MutationFunctionTransformer extends FunctionTransformer
{
	public function __construct(
		protected FieldDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
	}
	
	public function __invoke(WriteQueue $queue): ClassMethod
	{
		$this->method = new ClassMethod($this->node->name->value.'Mutation');
		
		$this->method->params = collect($this->node->arguments)
			->map(fn(InputValueDefinitionNode $arg) => FunctionParamTransformer::transform($arg, $this->parent, $this))
			->sortBy(fn(Param $param) => $param->type instanceof NullableType ? 1 : 0)
			->values()
			->all();
		
		// Create the typed request and response objects (this had been done using generics,
		// but implementing concrete classes allows for better IDE support in a few ways)
		PendingRequestTransformer::transform('mutation', $this->node, $this->parent);
		ResponseTransformer::transform('mutation', $this->node, $this->parent);
		
		$request_class = $this->fqcn(Taxonomy::make($this->node, 'mutation')->pendingRequest());
		
		$this->method->returnType = $request_class;
		$this->documentReturn($request_class);
		
		$args = collect($this->method->params)
			->map(fn(Param $param) => new ArrayItem(
				value: new Variable((string) $param->var->name),
				key: new String_((string) $param->var->name),
			))
			->all();
		
		$this->method->stmts = [
			new Return_(
				new New_($request_class, [
					new Arg(new Variable('this')),
					new Arg(new Array_($args)),
				]),
			),
		];
		
		return $this->method;
	}
	
	protected function listType(ListTypeNode $node, bool $nullable): NodeAbstract
	{
		return $nullable
			? new NullableType(new Name('iterable'))
			: new Name('iterable');
	}
}
