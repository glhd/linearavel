<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Requests\LinearObjectRequest;
use Glhd\Linearavel\Requests\PendingLinearListRequest;
use Glhd\Linearavel\Requests\PendingLinearObjectRequest;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use GraphQL\Language\AST\FieldDefinitionNode;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\Cast\String_ as StringCast;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Expression;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Return_;

class PendingRequestTransformer extends ClassTransformer
{
	use HasTypeNodes;
	
	public string $namespace;
	
	protected array $uses = [];
	
	public function __construct(
		protected string $sub_namespace,
		protected FieldDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
		$this->namespace = $this->parent->namespace;
	}
	
	protected function fqcn(string $fqcn): Name
	{
		$this->use($fqcn);
		
		return new Name(class_basename($fqcn));
	}
	
	public function __invoke(PendingTransformationQueue $queue): void
	{
		$type = $this->getUnderlyingType($this->node->type);
		
		$queue->add(new PendingTransformation(
			directory: "Requests/Pending/{$this->sub_namespace}",
			name: "Pending{$type->name}Request",
			tree: [
				new Namespace_(new Name($this->namespace."Requests\\Pending\\{$this->sub_namespace}")),
				fn() => $this->uses(),
				new Class_("Pending{$type->name}Request", [
					'stmts' => [
						$this->constructorStmt(),
						$this->getStmt(),
						$this->responseStmt(),
					],
					'extends' => $this->isList($this->node->type)
						? $this->fqcn(PendingLinearListRequest::class)
						: $this->fqcn(PendingLinearObjectRequest::class),
				]),
			],
		));
	}
	
	protected function constructorStmt()
	{
		return new ClassMethod('__construct', [
			'params' => [
				new Param(
					var: new Variable('connector'),
					type: $this->fqcn(LinearConnector::class),
				),
				new Param(
					var: new Variable('args'),
					default: new Array_(),
					type: new Name('array'),
					flags: 1, // public
				),
			],
			'flags' => 1, // public
			'stmts' => [
				new Expression(
					new StaticCall(
						class: new Name('parent'),
						name: new Identifier('__construct'),
						args: [
							new ClassConstFetch($this->getUnderlyingType($this->node->type), 'class'),
							new String_($this->node->name->value),
							new Variable('connector'),
							new StaticCall($this->fqcn(GraphQueryBuilder::class), 'make', [
								new Arg(new String_('query')),
								new Arg(new String_($this->node->name->value)),
								new Arg(new Variable('args')),
							]),
						],
					),
				),
			],
		]);
	}
	
	protected function getStmt()
	{
		return new ClassMethod('get', [
			'returnType' => new Name($this->getUnderlyingType($this->node->type)),
			'params' => [
				new Param(
					var: new Variable('fields'),
					type: new Name('string'),
					variadic: true,
				),
			],
			'flags' => 1, // public
			'stmts' => [
				new Return_(
					new StaticCall(
						class: new Name('parent'),
						name: new Identifier('get'),
						args: [
							new Arg(new Variable('fields'), unpack: true),
						],
					),
				),
			],
		]);
	}
	
	protected function responseStmt()
	{
		$type = $this->getUnderlyingType($this->node->type);
		$response_type = $this->fqcn("{$this->namespace}Responses\\{$this->sub_namespace}\\{$type->name}Response");
		
		return new ClassMethod('response', [
			'returnType' => $response_type,
			'params' => [
				new Param(
					var: new Variable('fields'),
					type: new Name('string'),
					variadic: true,
				),
			],
			'flags' => 1, // public
			'stmts' => [
				new Expression(
					new Assign(
						var: new Variable('query'),
						expr: new MethodCall(
							var: new PropertyFetch(new Variable('this'), new Identifier('query')),
							name: new Identifier('withFields'),
							args: [
								new Arg(new Variable('fields')),
							],
						),
					),
				),
				new Return_(
					new MethodCall(
						var: new MethodCall(
							var: new PropertyFetch(new Variable('this'), new Identifier('connector')),
							name: new Identifier('send'),
							args: [
								new Arg(
									new New_(
										class: $this->fqcn(LinearObjectRequest::class),
										args: [
											new Arg(new ClassConstFetch($response_type, 'class')),
											new Arg(new StringCast(new Variable('query'))),
										],
									),
								),
							],
						),
						name: new Identifier('throw'),
					),
				),
			],
		]);
	}
}
