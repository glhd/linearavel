<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\NonNullTypeNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use Illuminate\Support\Collection;
use PhpParser\Comment\Doc;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\UnionType;

class ParamTransformer
{
	protected Param $param;
	
	public static function transform(
		FieldDefinitionNode $node,
		ClassTransformer $parent
	) {
		$transformer = new static($node, $parent);
		return $transformer();
	}
	
	public function __construct(
		protected FieldDefinitionNode $node,
		protected ClassTransformer $parent,
	) {
		$this->param = new Param(
			var: new Variable($this->node->name->value),
			flags: 1,
		);
	}
	
	public function __invoke()
	{
		$this->param->type = $this->nodeType($this->node->type);
		
		return $this->param;
	}
	
	protected function nodeType(NamedTypeNode|ListTypeNode|NonNullTypeNode $node, bool $nullable = true)
	{
		return match ($node::class) {
			NamedTypeNode::class => $this->namedType($node, $nullable),
			NonNullTypeNode::class => $this->nodeType($node->type, false),
			ListTypeNode::class => $this->listType($node),
		};
	}
	
	protected function listType(ListTypeNode $node): Name
	{
		$type = $this->nodeType($node->type);
		$this->param->setDocComment(new Doc("/** @var Collection<int, {$type}> */"));
		$this->parent->use(Collection::class);
		
		return new Name('Collection');
	}
	
	protected function namedType(NamedTypeNode $node, bool $nullable = false): UnionType|Identifier|Name
	{
		$type = match ($node->name->value) {
			'Boolean' => new Identifier('bool'),
			'Float' => new Identifier('float'),
			'Int' => new Identifier('int'),
			'String', 'ID' => new Identifier('string'),
			'DateTime' => new FullyQualified('Carbon\CarbonImmutable'),
			'JSONObject' => new Identifier('object'),
			default => new FullyQualified($this->parent->namespace.'Data\\'.$node->name->value),
		};
		
		return $nullable 
			? new UnionType([$type, new Identifier('null')])
			: $type;
	}
}
