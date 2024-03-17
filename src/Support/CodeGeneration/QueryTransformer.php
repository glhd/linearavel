<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use PhpParser\Node\Arg;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\Trait_;
use Spatie\LaravelData\Data;

class QueryTransformer extends ClassTransformer
{
	public string $namespace;
	
	public static function transform(
		ObjectTypeDefinitionNode $node,
		Transformer $parent,
	) {
		$transformer = new static($node, $parent);
		return $transformer();
	}
	
	public function __construct(
		protected ObjectTypeDefinitionNode $node,
		public Transformer $parent,
	) {
		$this->namespace = $this->parent->namespace;
		// $this->use(Data::class);
	}
	
	public function __invoke(): array
	{
		// Generate the data first, since they may push items into `$uses`
		$queries = $this->queries();
		
		return array_filter([
			new Namespace_(new Name($this->namespace.'Connectors')),
			$this->uses(),
			new Trait_('QueriesLinear', [
				'stmts' => $queries,
			]),
		]);
	}
	
	protected function queries(): array
	{
		return collect($this->node->fields)
			->map(fn (FieldDefinitionNode $node) => FunctionTransformer::transform($node, $this, [
				new Return_(new MethodCall(
					var: new Variable('this'), 
					name: new Identifier('linearQuery'),
					args: [new Arg(new FuncCall(new Name('func_get_args')))], 
				)),
			]))
			->all();
	}
}
