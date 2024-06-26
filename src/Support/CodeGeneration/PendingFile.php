<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use Closure;
use GraphQL\Language\AST\DefinitionNode;
use GraphQL\Language\AST\DirectiveDefinitionNode;
use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\InputObjectTypeDefinitionNode;
use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\AST\UnionTypeDefinitionNode;
use Illuminate\Console\Command;
use Illuminate\Support\Stringable;
use PhpParser\PrettyPrinter;
use RuntimeException;
use Throwable;
use UnexpectedValueException;

class PendingFile
{
	protected const DEBUGGING = false;
	
	protected ?Command $command = null;
	
	protected ?PrettyPrinter $printer = null;
	
	public static function fromNode(DefinitionNode $node, array $tree): static
	{
		$filename = match (true) {
			$node->name->value === 'Query' => Finder::basePath('Connectors/QueriesLinear.php'),
			$node->name->value === 'Mutation' => Finder::basePath('Connectors/MutatesLinear.php'),
			$node::class === InterfaceTypeDefinitionNode::class => Finder::make(Taxonomy::make($node)->contract())->absolutePath(),
			$node::class === ObjectTypeDefinitionNode::class => Finder::make(Taxonomy::make($node)->data())->absolutePath(),
			$node::class === EnumTypeDefinitionNode::class => Finder::make(Taxonomy::make($node)->enum())->absolutePath(),
			$node::class === InputObjectTypeDefinitionNode::class => Finder::make(Taxonomy::make($node)->requestInput())->absolutePath(),
			$node::class === UnionTypeDefinitionNode::class => Finder::make(Taxonomy::make($node)->contract())->absolutePath(),
			$node::class === DirectiveDefinitionNode::class => Finder::make(Taxonomy::make($node)->directive())->absolutePath(),
			default => throw new UnexpectedValueException('Did not expect: '.class_basename($node)),
		};
		
		return new static($filename, $tree);
	}
	
	public function __construct(
		public Stringable|string $filename,
		public array $tree,
	) {
		// Force stringable to string
		$this->filename = (string) $this->filename;
		
		// Resolve any lazy element in the tree
		array_walk_recursive($this->tree, function(&$value) {
			if ($value instanceof Closure) {
				$value = $value();
			}
		});
	}
	
	public function withCommand(?Command $command): static
	{
		$this->command = $command;
		
		return $this;
	}
	
	public function withPrinter(PrettyPrinter $printer): static
	{
		$this->printer = $printer;
		
		return $this;
	}
	
	public function save(): bool
	{
		try {
			$this->printer ??= new PrettyPrinter\Standard();
			
			// Allow for file-by-file debugging
			if (self::DEBUGGING && $this->command && ! $this->command->confirm("Write {$this->filename}?")) {
				throw new RuntimeException('Aborted');
			}
			
			$php = $this->printer->prettyPrint($this->tree);
			
			if (! file_put_contents($this->filename, "<?php\n\n{$php}\n")) {
				throw new RuntimeException("Unable to write to '{$this->filename}'");
			}
			
			$this->command?->line("Wrote <info>{$this->filename}</info>");
		} catch (Throwable $exception) {
			$this->command?->error("Exception thrown while trying to write <{$this->filename}>");
			throw $exception;
		}
		
		return true;
	}
}
