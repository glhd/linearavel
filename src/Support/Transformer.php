<?php

namespace Glhd\Linearavel\Support;

use GraphQL\Language\AST\DefinitionNode;
use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\EnumValueDefinitionNode;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use GraphQL\Language\AST\ListTypeNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\NonNullTypeNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\Parser;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Name\FullyQualified;
use PhpParser\Node\Param;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Enum_;
use PhpParser\Node\Stmt\EnumCase;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\UnionType;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

class Transformer
{
	// protected static $debugging = true;
	
	public function __construct(
		protected string $filename,
		protected string $namespace = '\\',
	) {
		if (isset(self::$debugging)) {
			$debug = '<?php class Foo implements \Bar\Baz { }';
			$tree = (new ParserFactory())->createForNewestSupportedVersion()->parse($debug);
			dd($tree);
		}
	}
	
	public function transform()
	{
		$schema = file_get_contents($this->filename);
		
		$tree = collect(Parser::parse($schema)->definitions)
			->map(fn(DefinitionNode $definition) => match ($definition::class) {
				InterfaceTypeDefinitionNode::class => $this->interface($definition),
				ObjectTypeDefinitionNode::class => $this->class($definition),
				EnumTypeDefinitionNode::class => $this->enum($definition),
				default => null,
			})
			->filter()
			->flatten(1)
			->all();
		
		return (new Standard())->prettyPrint($tree);
	}
	
	protected function interface(InterfaceTypeDefinitionNode $node): array
	{
		return [
			new Interface_($node->name->value),
		];
	}
	
	protected function class(ObjectTypeDefinitionNode $node): array
	{
		return [
			new Class_($node->name->value, [
				'stmts' => [
					new ClassMethod('__construct', [
						'params' => collect($node->fields)
							->map(fn(FieldDefinitionNode $node) => $this->param($node))
							->all(),
					], [
						'comments' => [
							// new Doc('/** '.$doc.' */'),
						],
					]),
				],
				'implements' => collect($node->interfaces)
					->map(fn(NamedTypeNode $node) => new FullyQualified($this->namespace.'Data\\Contracts\\'.$node->name->value))
					->all(),
			]),
		];
	}
	
	protected function param(FieldDefinitionNode $node)
	{
		$param = new Param(
			var: new Variable($node->name->value),
			flags: 1,
		);
		
		$param->type = $this->nodeType($node->type, $param);
		
		return $param;
	}
	
	protected function nodeType(NamedTypeNode|ListTypeNode|NonNullTypeNode $node, bool $nullable = true)
	{
		return match ($node::class) {
			NamedTypeNode::class => $this->namedType($node, $nullable),
			NonNullTypeNode::class => $this->nodeType($node->type, false),
			ListTypeNode::class => $this->listType($node),
		};
	}
	
	protected function listType(ListTypeNode $node): Identifier
	{
		// TODO: Add type information
		return new Identifier('array');
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
			default => new FullyQualified($this->namespace.'Data\\'.$node->name->value),
		};
		
		return $nullable 
			? new UnionType([$type, new Identifier('null')])
			: $type;
	}
	
	protected function enum(EnumTypeDefinitionNode $node): array
	{
		return [
			new Enum_($node->name->value, [
				'scalarType' => new Identifier('string'),
				'stmts' => collect($node->values)
					->map(function(EnumValueDefinitionNode $node) {
						return (new EnumCase($node->name->value, new String_($node->name->value)));
					})
					->all(),
			]),
		];
	}
}
