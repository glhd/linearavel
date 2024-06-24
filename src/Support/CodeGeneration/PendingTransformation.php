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
use PhpParser\PrettyPrinter;
use RuntimeException;
use UnexpectedValueException;

class PendingTransformation
{
	protected ?Command $command = null;
	
	protected ?PrettyPrinter $printer = null;
	
	public static function fromNode(DefinitionNode $node, array $tree): static
	{
		[$name, $directory] = match (true) {
			$node->name->value === 'Query' => ['QueriesLinear', 'Connectors'],
			$node->name->value === 'Mutation' => ['MutatesLinear', 'Connectors'],
			$node::class === InterfaceTypeDefinitionNode::class => [$node->name->value, 'Data/Contracts'],
			$node::class === ObjectTypeDefinitionNode::class => [$node->name->value, 'Data'],
			$node::class === EnumTypeDefinitionNode::class => [$node->name->value, 'Data/Enums'],
			$node::class === InputObjectTypeDefinitionNode::class => [$node->name->value, 'Requests/Inputs'],
			$node::class === UnionTypeDefinitionNode::class => [$node->name->value, 'Data/Contracts'],
			$node::class === DirectiveDefinitionNode::class => [$node->name->value, 'Data/Directives'],
			default => throw new UnexpectedValueException('Did not expect: '.class_basename($node)),
		};
		
		return new static($directory, $name, $tree);
	}
	
	public function __construct(
		public string $directory,
		public string $name,
		public array $tree,
	) {
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
		$this->printer ??= new PrettyPrinter\Standard();
		
		$filename = sprintf('%s/%s/%s.php', realpath(__DIR__.'/../../../src/'), $this->directory, $this->name);
		$php = $this->printer->prettyPrint($this->tree);
		
		if (! file_put_contents($filename, "<?php\n\n{$php}\n")) {
			throw new RuntimeException("Unable to write to '{$filename}'");
		}
		
		$this->command?->line("Wrote <info>{$filename}</info>");
		
		return true;
	}
}
