<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Glhd\Linearavel\Support\KeyHelper;
use GraphQL\Language\AST\FieldDefinitionNode;
use Illuminate\Support\Collection;
use Illuminate\Support\Stringable;
use PhpParser\Builder\ClassConst;
use PhpParser\Comment\Doc;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\Cast\String_ as StringCast;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\Instanceof_;
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
use PhpParser\Node\Stmt\Nop;
use PhpParser\Node\Stmt\Return_;
use Throwable;

class PendingRequestTransformer extends ClassTransformer
{
	use HasTypeNodes;
	
	public string $namespace;
	
	protected Stringable $name;
	
	protected string $class_name;
	
	protected string $kind;
	
	protected array $uses = [];
	
	public function __construct(
		protected string $sub_namespace,
		protected FieldDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
		$this->namespace = $this->parent->namespace;
		$this->name = str($this->node->name->value);
		$this->class_name = (string) $this->name->studly()->prepend('Pending')->append('Request');
		$this->kind = 'Mutations' === $this->sub_namespace ? 'mutation' : 'query';
	}
	
	public function __invoke(PendingTransformationQueue $queue): void
	{
		$queue->add(new PendingTransformation(
			directory: "Requests/Pending/{$this->sub_namespace}",
			name: $this->class_name,
			tree: [
				new Namespace_(new Name($this->namespace."Requests\\Pending\\{$this->sub_namespace}")),
				fn() => $this->uses(),
				new Class_($this->class_name, [
					'stmts' => [
						$this->attributesConstStmt(),
						$this->constructorStmt(),
						$this->getStmt(),
						$this->responseStmt(),
					],
					'extends' => $this->fqcn(PendingLinearRequest::class),
				]),
			],
		));
	}
	
	protected function fqcn(string $fqcn): Name
	{
		$this->use($fqcn);
		
		return new Name(class_basename($fqcn));
	}
	
	public function attributesConstStmt()
	{
		try {
			$keys = app(KeyHelper::class)
				->get($this->namespace.'Data\\'.$this->getUnderlyingType($this->node->type))
				->filter(function($key) {
					$dots = substr_count($key, '.');
					return $dots === 0 || (str_starts_with($key, 'nodes.') && $dots < 2);
				})
				->values()
				->all();
		} catch (Throwable) {
			$keys = [];
		}
		
		return (new ClassConst('AVAILABLE_ATTRIBUTES', $keys))
			->makeProtected()
			->getNode();
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
							new Variable('connector'),
							new StaticCall($this->fqcn(GraphQueryBuilder::class), 'make', [
								new Arg(new String_($this->kind)),
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
		return $this->isList($this->node->type)
			? $this->getListStmt()
			: $this->getObjectStmt();
	}
	
	protected function getListStmt()
	{
		return new ClassMethod('get', [
			'returnType' => $this->fqcn(Collection::class),
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
					new MethodCall(
						var: new MethodCall(
							var: new Variable('this'),
							name: new Identifier('response'),
							args: [
								new Arg(new Variable('fields'), unpack: true),
							],
						),
						name: new Identifier('resolve'),
					),
				),
			],
		], [
			'comments' => [
				new Doc('/** @returns Collection<int, '.(new Name($this->getUnderlyingType($this->node->type)))->name.'> */'),
			],
		]);
	}
	
	protected function getObjectStmt()
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
					new MethodCall(
						var: new MethodCall(
							var: new Variable('this'),
							name: new Identifier('response'),
							args: [
								new Arg(new Variable('fields'), unpack: true),
							],
						),
						name: new Identifier('resolve'),
					),
				),
			],
		]);
	}
	
	protected function responseStmt()
	{
		$response_class = $this->name->studly()->append('Response');
		$response_type = $this->fqcn("{$this->namespace}Responses\\{$this->sub_namespace}\\{$response_class}");
		
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
				new Nop(),
				new Expression(
					new Assign(
						var: new Variable('response'),
						expr: new MethodCall(
							var: new MethodCall(
								var: new PropertyFetch(new Variable('this'), new Identifier('connector')),
								name: new Identifier('send'),
								args: [
									new Arg(
										new New_(
											class: $this->fqcn(LinearRequest::class),
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
				),
				new Nop(),
				new Expression(
					new FuncCall(
						name: new Name('assert'),
						args: [new Arg(new Instanceof_(new Variable('response'), $response_type))],
					),
				),
				new Nop(),
				new Return_(
					new Variable('response'),
				),
			],
		]);
	}
}
