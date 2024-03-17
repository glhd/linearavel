<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InputValueDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\NonNullTypeNode;
use Illuminate\Support\Collection;
use PhpParser\Comment\Doc;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\NullableType;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\UnionType;
use PhpParser\NodeAbstract;

class FunctionTransformer
{
	protected ClassMethod $method;
	
	protected array $docs = [];
	
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
		$this->method = new ClassMethod($this->node->name->value);
	}
	
	public function __invoke()
	{
		$args = collect($this->node->arguments)
			->map(fn (InputValueDefinitionNode $arg) => FunctionParamTransformer::transform($arg, $this->parent, $this))
			->sortBy(fn (Param $param) => $param->type instanceof NullableType ? 1 : 0)
			->values()
			->all();
		
		$this->method->params = $args;
		
		if (count($this->docs)) {
			$comment = "/**\n * ".implode("\n * ", $this->docs)."\n */";
			$this->method->setDocComment(new Doc($comment));
		}
		
		return $this->method;
	}
	
	public function documentParam(string $name, string $type = '', string $description = ''): static
	{
		$this->docs[] = '@param '.trim("{$type} \${$name} {$description}");
		
		return $this;
	}
	
	protected function nodeType(NamedTypeNode|ListTypeNode|NonNullTypeNode $node, bool $nullable = true)
	{
		return match ($node::class) {
			NamedTypeNode::class => $this->namedType($node, $nullable),
			NonNullTypeNode::class => $this->nodeType($node->type, false),
			ListTypeNode::class => $this->listType($node),
		};
	}
	
	protected function listType(ListTypeNode $node): UnionType|Name
	{
		$type = $this->typeToName($node->type);
		$this->method->setDocComment(new Doc("/** @var Collection<int, {$type}> */"));
		$this->parent->use(Collection::class);
		
		if ($this->node instanceof InputValueDefinitionNode) {
			return new Name('Collection');
		}
		
		return new UnionType([
			new Name('Optional'),
			new Name('Collection'),
		]);
	}
	
	protected function namedType(NamedTypeNode $node, bool $nullable = false): NodeAbstract
	{
		$type = $this->typeToName($node);
		
		return $nullable
			? new NullableType($type)
			: $type;
	}
	
	protected function typeToName(NamedTypeNode|NonNullTypeNode $node): Identifier|Name
	{
		if ($node instanceof NonNullTypeNode) {
			return $this->typeToName($node->type);
		}
		
		return match ($node->name->value) {
			'Boolean' => new Identifier('bool'),
			'Float' => new Identifier('float'),
			'Int' => new Identifier('int'),
			'String', 'ID' => new Identifier('string'),
			'DateTime' => $this->fqcn('Carbon\CarbonImmutable'),
			default => value(function() use ($node) {
				// Treat all scalars as strings for now
				if ($this->parent->parent->scalars->has($node->name->value)) {
					return new Identifier('string');
				}
				
				return $this->fqcn(
					$this->parent->parent->registry->get($node->name->value) ?? $this->parent->namespace.'Data\\'.$node->name->value
				);
			}),
		};
	}
	
	protected function fqcn(string $fqcn): Name
	{
		$this->parent->use($fqcn);
		return new Name(class_basename($fqcn));
	}
}
