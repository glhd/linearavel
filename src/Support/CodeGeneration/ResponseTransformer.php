<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Contracts\SkipsCodeGeneration;
use Glhd\Linearavel\Responses\LinearResponse;
use GraphQL\Language\AST\FieldDefinitionNode;
use Illuminate\Support\Collection;
use PhpParser\Comment\Doc;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\ClassConstFetch;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Return_;

class ResponseTransformer extends ClassTransformer
{
	use HasTypeNodes;
	
	protected array $uses = [];
	
	public function __construct(
		public string $kind,
		protected FieldDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
	}
	
	public function __invoke(WriteQueue $queue): void
	{
		$class_name = Taxonomy::make($this->node, $this->kind)->response();
		
		if (should_skip($class_name)) {
			return;
		}
		
		$queue->add(new PendingFile(
			filename: Finder::make($class_name)->absolutePath(),
			tree: [
				new Namespace_(new Name((string) $class_name->beforeLast('\\'))),
				fn() => $this->uses(),
				new Class_((string) $class_name->classBasename(), [
					'stmts' => [
						$this->resolveStmt(),
					],
					'extends' => $this->fqcn(LinearResponse::class),
				]),
			],
		));
	}
	
	protected function fqcn(string $fqcn): Name
	{
		$this->use($fqcn);
		
		return new Name(class_basename($fqcn));
	}
	
	protected function resolveStmt()
	{
		return $this->isList($this->node->type)
			? $this->resolveListStmt()
			: $this->resolveObjectStmt();
	}
	
	protected function resolveListStmt()
	{
		return new ClassMethod('resolve', [
			'returnType' => $this->fqcn(Collection::class),
			'flags' => 1, // public
			'stmts' => [
				new Return_(
					new StaticCall(
						class: $this->getUnderlyingType($this->node->type),
						name: new Identifier('collect'),
						args: [
							new Arg(
								new MethodCall(
									var: new Variable('this'),
									name: new Identifier('json'),
									args: [
										new Arg(new String_("data.{$this->node->name->value}")),
									],
								),
							),
							new Arg(
								new ClassConstFetch($this->fqcn(Collection::class), 'class'),
							),
						],
					),
				),
			],
		], [
			'comments' => [
				new Doc('/** @returns Collection<int, '.(new Name($this->getUnderlyingType($this->node->type)))->name.'> */'),
			],
		]);
	}
	
	protected function resolveObjectStmt()
	{
		return new ClassMethod('resolve', [
			'returnType' => new Name($this->getUnderlyingType($this->node->type)),
			'flags' => 1, // public
			'stmts' => [
				new Return_(
					new StaticCall(
						class: $this->getUnderlyingType($this->node->type),
						name: new Identifier('from'),
						args: [
							new Arg(
								new MethodCall(
									var: new Variable('this'),
									name: new Identifier('json'),
									args: [
										new Arg(new String_("data.{$this->node->name->value}")),
									],
								),
							),
						],
					),
				),
			],
		]);
	}
}
