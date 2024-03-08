<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\DefinitionNode;
use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\EnumValueDefinitionNode;
use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\Parser;
use PhpParser\Node\Identifier;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Enum_;
use PhpParser\Node\Stmt\EnumCase;
use PhpParser\Node\Stmt\Interface_;
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
			$debug = <<<'PHP'
			<?php
			
			class Baz {
				public function __construct(
					#[WithCast(DateTimeInterfaceCast::class, format: \DateTimeInterface::DATE_RFC3339_EXTENDED)]
					public CarbonImmutable $c,
				) {}
			}
			PHP;
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
		return [new Interface_($node->name->value)];
	}
	
	protected function class(ObjectTypeDefinitionNode $node): array
	{
		return ClassTransformer::transform($node, $this->namespace);
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
