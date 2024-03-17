<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\DefinitionNode;
use GraphQL\Language\AST\DirectiveDefinitionNode;
use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\InputObjectTypeDefinitionNode;
use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\AST\ScalarTypeDefinitionNode;
use GraphQL\Language\AST\UnionTypeDefinitionNode;
use GraphQL\Language\Parser;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter;
use RuntimeException;
use UnexpectedValueException;

class Transformer
{
	public Collection $registry;
	
	public Collection $scalars;
	
	public function __construct(
		protected string $filename,
		public string $namespace = 'Glhd\\Linearavel\\',
		protected ?Command $command = null,
		protected PrettyPrinter $printer = new PrettyPrinter\Standard(),
	) {
		$this->registry = new Collection();
		$this->scalars = new Collection();
		
		// $debugging = true;
		
		if (isset($debugging)) {
			$debug = <<<'PHP'
			<?php
			function foo(?bool $bar = null) {}
			PHP;
			$tree = (new ParserFactory())->createForNewestSupportedVersion()->parse($debug);
			dd($tree);
		}
	}
	
	public function write()
	{
		$this->command?->info('Parsing schema...');
		
		$schema = file_get_contents($this->filename);
		
		collect(Parser::parse($schema)->definitions)
			->each($this->register(...))
			->each(fn(DefinitionNode $definition) => match ($definition::class) {
				// InterfaceTypeDefinitionNode::class => $this->interface($definition),
				ObjectTypeDefinitionNode::class => $this->class($definition),
				// EnumTypeDefinitionNode::class => $this->enum($definition),
				InputObjectTypeDefinitionNode::class => $this->input($definition),
				UnionTypeDefinitionNode::class => null, // TODO
				DirectiveDefinitionNode::class => null,
				default => null,
			});
	}
	
	public function register(DefinitionNode $node): DefinitionNode
	{
		match ($node::class) {
			InterfaceTypeDefinitionNode::class => $this->registry->put($node->name->value, $this->namespace.'Data\\Contracts\\'.$node->name->value),
			ObjectTypeDefinitionNode::class => $this->registry->put($node->name->value, $this->namespace.'Data\\'.$node->name->value),
			EnumTypeDefinitionNode::class => $this->registry->put($node->name->value, $this->namespace.'Data\\Enums\\'.$node->name->value),
			InputObjectTypeDefinitionNode::class => $this->registry->put($node->name->value, $this->namespace.'Requests\\Inputs\\'.$node->name->value),
			ScalarTypeDefinitionNode::class => $this->scalars->put($node->name->value, 'string'),
			default => null,
		};
		
		return $node;
	}
	
	protected function interface(InterfaceTypeDefinitionNode $node): bool
	{
		$tree = InterfaceTransformer::transform($node, $this->namespace);
		
		return $this->save($node, $tree);
	}
	
	protected function class(ObjectTypeDefinitionNode $node): bool
	{
		if ('Query' !== $node->name->value) {
			return true; // FIXME
		}
		
		$tree = match($node->name->value) {
			'Query' => QueryTransformer::transform($node, $this),
			'Mutation' => TypeTransformer::transform($node, $this), // FIXME
			default => TypeTransformer::transform($node, $this),
		};
		
		return $this->save($node, $tree);
	}
	
	protected function input(InputObjectTypeDefinitionNode $node): bool
	{
		$tree = InputTransformer::transform($node, $this);
		
		return $this->save($node, $tree);
	}
	
	protected function enum(EnumTypeDefinitionNode $node): bool
	{
		$tree = EnumTransformer::transform($node, $this->namespace);
		
		return $this->save($node, $tree);
	}
	
	protected function save(DefinitionNode $node, array $tree): bool
	{
		$name = $node->name->value;
		
		[$label, $directory] = match ($node::class) {
			InterfaceTypeDefinitionNode::class => ['interface', 'Data/Contracts'],
			ObjectTypeDefinitionNode::class => ['type', 'Data'],
			EnumTypeDefinitionNode::class => ['enum', 'Data/Enums'],
			InputObjectTypeDefinitionNode::class => ['input', 'Requests/Inputs'],
			UnionTypeDefinitionNode::class => ['union', 'Data/Contracts'],
			DirectiveDefinitionNode::class => ['directive', 'Data/Directives'],
			default => throw new UnexpectedValueException("Did not expect: ".class_basename($node)),
		};
		
		if ('Query' === $name) {
			$name = 'QueriesLinear';
			$label = 'queries';
			$directory = 'Requests';
		}
		
		$filename = sprintf("%s/%s/%s.php", realpath(__DIR__.'/../../../src/'), $directory, $name);
		$php = $this->printer->prettyPrint($tree);
		
		if (! file_put_contents($filename, "<?php\n\n{$php}\n")) {
			throw new RuntimeException("Unable to write to '{$filename}'");
		}
		
		$this->command?->line("Wrote <info>{$label}</info> to <info>{$filename}</info>");
		
		return true;
	}
}
