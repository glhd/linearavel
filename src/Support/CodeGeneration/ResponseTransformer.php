<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Glhd\Linearavel\Responses\LinearListResponse;
use Glhd\Linearavel\Responses\LinearObjectResponse;
use GraphQL\Language\AST\FieldDefinitionNode;
use PhpParser\Builder\Property;
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
	
	public string $namespace;
	
	protected array $uses = [];
	
	public function __construct(
		public string $sub_namespace,
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
			directory: "Responses/{$this->sub_namespace}",
			name: "{$type->name}Response",
			tree: [
				new Namespace_(new Name($this->namespace."Responses\\{$this->sub_namespace}")),
				fn() => $this->uses(),
				new Class_("{$type->name}Response", [
					'stmts' => [
						$this->classProperty(),
						$this->nameProperty(),
						$this->resolveStmt(),
					],
					'extends' => $this->isList($this->node->type)
						? $this->fqcn(LinearListResponse::class)
						: $this->fqcn(LinearObjectResponse::class),
				]),
			],
		));
	}
	
	protected function classProperty()
	{
		return (new Property('class'))
			->makePublic()
			->setType('string')
			->setDefault(new ClassConstFetch($this->getUnderlyingType($this->node->type), 'class'))
			->getNode();
	}
	
	protected function nameProperty()
	{
		return (new Property('name'))
			->makePublic()
			->setType('string')
			->setDefault(new String_($this->node->name->value))
			->getNode();
	}
	
	protected function resolveStmt()
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
