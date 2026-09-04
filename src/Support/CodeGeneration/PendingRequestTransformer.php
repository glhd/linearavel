<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Connectors\LinearConnector;
use Glhd\Linearavel\Requests\LinearRequest;
use Glhd\Linearavel\Requests\PendingLinearRequest;
use Glhd\Linearavel\Support\GraphQueryBuilder;
use Glhd\Linearavel\Support\KeyHelper;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InputValueDefinitionNode;
use GraphQL\Language\Printer;
use Illuminate\Support\Collection;
use PhpParser\Builder\ClassConst;
use PhpParser\Comment\Doc;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\Assign;
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
use Spatie\LaravelData\Data;
use Throwable;

class PendingRequestTransformer extends ClassTransformer
{
	use HasTypeNodes;
	
	protected array $uses = [];
	
	public function __construct(
		protected string $kind,
		protected FieldDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
	}
	
	public function __invoke(WriteQueue $queue): void
	{
		$class_name = Taxonomy::make($this->node, $this->kind)->pendingRequest();
		
		$queue->add(new PendingFile(
			filename: Finder::make($class_name)->absolutePath(),
			tree: [
				new Namespace_(new Name((string) $class_name->beforeLast('\\'))),
				fn() => $this->uses(),
				new Class_((string) $class_name->classBasename(), [
					'stmts' => [
						$this->attributesConstStmt(),
						$this->argumentTypesConstStmt(),
						$this->constructorStmt(),
						$this->getStmt(),
						$this->responseStmt(),
					],
					'extends' => $this->fqcn(PendingLinearRequest::class),
				]),
			],
		));
	}
	
	public function attributesConstStmt()
	{
		$keys = $this->defaultAttributes();
		
		return (new ClassConst('DEFAULT_ATTRIBUTES', $keys))
			->makeProtected()
			->getNode();
	}
	
	/**
	 * The GraphQL type of each argument, so that the query builder can send them
	 * as variables rather than inlining them into the query.
	 */
	public function argumentTypesConstStmt()
	{
		$types = [];
		
		foreach ($this->node->arguments as $argument) {
			assert($argument instanceof InputValueDefinitionNode);
			
			$types[$argument->name->value] = Printer::doPrint($argument->type);
		}
		
		return (new ClassConst('ARGUMENT_TYPES', $types))
			->makeProtected()
			->getNode();
	}
	
	protected function fqcn(string $fqcn): Name
	{
		$this->use($fqcn);
		
		return new Name(class_basename($fqcn));
	}
	
	/** @return array<int, string> */
	protected function defaultAttributes(): array
	{
		$graphql_type = $this->underlyingTypeNode($this->node->type)->name->value;
		
		$members = $this->transformer()->unionMembers($graphql_type);
		
		return null === $members
			? $this->defaultAttributesForType($graphql_type)
			: $this->defaultAttributesForUnion($members);
	}
	
	/**
	 * Unions are queried with an inline fragment per member type, plus `__typename`
	 * so that the response knows which member it got back.
	 *
	 * @param array<int, string> $members
	 * @return array<int, string>
	 */
	protected function defaultAttributesForUnion(array $members): array
	{
		$keys = ['__typename'];
		
		foreach ($members as $member) {
			foreach ($this->keysFor($member) as $key) {
				$keys[] = GraphQueryBuilder::fragment($member).".{$key}";
			}
		}
		
		return $keys;
	}
	
	/** @return array<int, string> */
	protected function defaultAttributesForType(string $graphql_type): array
	{
		$all_keys = $this->keysFor($graphql_type);
		
		$keys = $all_keys
			->filter(function($key) {
				$dots = substr_count($key, '.');
				return $dots === 0 || (str_starts_with($key, 'nodes.') && $dots < 2);
			})
			->values()
			->all();
		
		if ($all_keys->isNotEmpty()) {
			// First we'll try to load a larger list for auto-complete
			$meta_keys = $all_keys
				->filter(function($key) {
					$dots = substr_count($key, '.');
					return $dots < 2 || (str_starts_with($key, 'nodes.') && $dots < 3);
				})
				->values()
				->all();
			
			if (count($meta_keys) > 50) {
				$meta_keys = $keys;
			}
			
			app(PhpStormMetaWriter::class)->register(
				class: Taxonomy::make($this->node, $this->kind)->pendingRequest(),
				arguments: $meta_keys,
			);
		}
		
		return $keys;
	}
	
	/**
	 * The field names of a GraphQL type, as far as we can tell from the data class
	 * we generated for it. Types we haven't written yet come back empty.
	 *
	 * @return Collection<int, string>
	 */
	protected function keysFor(string $graphql_type): Collection
	{
		$fqcn = $this->transformer()->registry->get($graphql_type);
		
		if (! $fqcn || ! is_a($fqcn, Data::class, true)) {
			return new Collection();
		}
		
		try {
			return collect(app(KeyHelper::class)->get($fqcn));
		} catch (Throwable) {
			return new Collection();
		}
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
								new Arg(new ClassConstFetch(new Name('static'), 'ARGUMENT_TYPES')),
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
		$response_type = $this->fqcn(Taxonomy::make($this->node, $this->kind)->response());
		
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
								new Arg(
									new MethodCall(
										var: new Variable('this'),
										name: new Identifier('normalizeFields'),
										args: [
											new Arg(new Variable('fields')),
										],
									)
								),
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
												new Arg(new Variable('query')),
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
