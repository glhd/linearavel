<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\DefinitionNode;
use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\EnumValueDefinitionNode;
use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\Parser;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt\Enum_;
use PhpParser\Node\Stmt\EnumCase;
use PhpParser\Node\Stmt\Interface_;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;
use RuntimeException;

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
	
	public function write()
	{
		$schema = file_get_contents($this->filename);
		
		collect(Parser::parse($schema)->definitions)
			->each(fn(DefinitionNode $definition) => match ($definition::class) {
				InterfaceTypeDefinitionNode::class => $this->interface($definition),
				ObjectTypeDefinitionNode::class => $this->class($definition),
				EnumTypeDefinitionNode::class => $this->enum($definition),
				default => null,
			});
	}
	
	protected function interface(InterfaceTypeDefinitionNode $node): void
	{
		$tree = [
			new Namespace_(new Name($this->namespace.'Data\\Contracts')),
			new Interface_($node->name->value)
		];
		
		$filename = realpath(__DIR__.'/../../../src/Data/Contracts/').'/'.$node->name->value.'.php';
		$php = (new Standard())->prettyPrint($tree);
		
		if (! file_put_contents($filename, "<?php\n\n{$php}\n")) {
			throw new RuntimeException("Unable to write to '{$filename}'");
		}
	}
	
	protected function class(ObjectTypeDefinitionNode $node): void
	{
		$tree = ClassTransformer::transform($node, $this->namespace);
		
		$filename = realpath(__DIR__.'/../../../src/Data').'/'.$node->name->value.'.php';
		$php = (new Standard())->prettyPrint($tree);
		
		if (! file_put_contents($filename, "<?php\n\n{$php}\n")) {
			throw new RuntimeException("Unable to write to '{$filename}'");
		}
	}
	
	protected function enum(EnumTypeDefinitionNode $node): void
	{
		$tree = [
			new Namespace_(new Name($this->namespace.'Enums')),
			new Enum_($node->name->value, [
				'scalarType' => new Identifier('string'),
				'stmts' => collect($node->values)
					->map(function(EnumValueDefinitionNode $node) {
						return (new EnumCase($node->name->value, new String_($node->name->value)));
					})
					->all(),
			]),
		];
		
		$filename = realpath(__DIR__.'/../../../src/Data/Enums').'/'.$node->name->value.'.php';
		$php = (new Standard())->prettyPrint($tree);
		
		if (! file_put_contents($filename, "<?php\n\n{$php}\n")) {
			throw new RuntimeException("Unable to write to '{$filename}'");
		}
	}
}
