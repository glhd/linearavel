<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\DefinitionNode;
use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\FieldDefinitionNode;
use GraphQL\Language\AST\InputObjectTypeDefinitionNode;
use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\AST\TypeDefinitionNode;
use GraphQL\Language\AST\TypeNode;
use GraphQL\Language\AST\TypeSystemDefinitionNode;
use GraphQL\Language\AST\UnionTypeDefinitionNode;
use Illuminate\Support\Stringable;
use UnexpectedValueException;

class Taxonomy
{
	public const NS = 'Glhd\\Linearavel\\';
	
	/**
	 * GraphQL type names that need a different PHP name, because another type in
	 * the same namespace differs from it only by case. PHP class names are
	 * case-insensitive, so `GithubRepo` and `GitHubRepo` cannot coexist.
	 *
	 * @var array<string, string>
	 */
	protected static array $aliases = [];
	
	public Stringable $name;
	
	/** The name of the type as it appears in the GraphQL schema. */
	public string $graphql_name;
	
	public static function make(mixed $source, string $kind = 'query')
	{
		return new static($source, $kind);
	}
	
	public static function ns(?string $namespace = null, bool $prefix = false): string
	{
		return str(static::NS)
			->append($namespace)
			->when($prefix, fn($ns) => $ns->finish('\\'), fn($ns) => $ns->rtrim('\\'))
			->toString();
	}
	
	/**
	 * Work out which schema types need renaming to survive PHP's case-insensitive
	 * class names, and remember the new names for the rest of the run.
	 *
	 * @param iterable<DefinitionNode> $definitions
	 */
	public static function resolveCollisions(iterable $definitions): void
	{
		static::$aliases = [];
		
		$groups = [];
		
		foreach ($definitions as $definition) {
			if (! isset($definition->name)) {
				continue;
			}
			
			$group = match ($definition::class) {
				ObjectTypeDefinitionNode::class => 'data',
				EnumTypeDefinitionNode::class => 'enum',
				InputObjectTypeDefinitionNode::class => 'input',
				InterfaceTypeDefinitionNode::class, UnionTypeDefinitionNode::class => 'contract',
				default => null,
			};
			
			if ($group) {
				$groups[$group][] = $definition->name->value;
			}
		}
		
		foreach ($groups as $names) {
			foreach (static::collisions($names) as $colliding) {
				// Sorting keeps the assignment stable regardless of schema ordering
				sort($colliding, SORT_STRING);
				
				foreach ($colliding as $index => $name) {
					if ($index > 0) {
						static::$aliases[$name] = $name.($index + 1);
					}
				}
			}
		}
	}
	
	/** @return array<string, string> */
	public static function aliases(): array
	{
		return static::$aliases;
	}
	
	public function __construct(
		mixed $source,
		public string $kind = 'query',
	) {
		$this->graphql_name = match (true) {
			$source instanceof TypeDefinitionNode => $source->getName()->value,
			$source instanceof FieldDefinitionNode, $source instanceof TypeSystemDefinitionNode, $source instanceof TypeNode => $source->name->value,
			is_string($source) => $source,
			default => throw new UnexpectedValueException('Cannot infer taxonomy for '.get_debug_type($source)),
		};
		
		$this->name = str(static::$aliases[$this->graphql_name] ?? $this->graphql_name);
	}
	
	/** Is this type's PHP name different from its GraphQL name? */
	public function renamed(): bool
	{
		return $this->name->toString() !== $this->graphql_name;
	}
	
	public function data(): Stringable
	{
		return $this->name->prepend(static::ns('Data', prefix: true));
	}
	
	public function contract(): Stringable
	{
		return $this->name->prepend(static::ns('Data\\Contracts', prefix: true));
	}
	
	public function directive(): Stringable
	{
		return $this->name->prepend(static::ns('Data\\Directives', prefix: true));
	}
	
	public function enum(): Stringable
	{
		return $this->name->prepend(static::ns('Data\\Enums', prefix: true));
	}
	
	public function requestInput(): Stringable
	{
		return $this->name
			->studly()
			->finish('Input')
			->prepend(static::ns('Requests\\Inputs', prefix: true));
	}
	
	public function pendingRequest(): Stringable
	{
		$namespace = str(static::ns('Requests\\Pending', prefix: true))
			->append(str($this->kind)->plural()->studly())
			->finish('\\');
		
		return $this->name
			->studly()
			->prepend('Pending')
			->append(str($this->kind)->singular()->studly())
			->finish('Request')
			->prepend($namespace);
	}
	
	public function response(): Stringable
	{
		$namespace = str(static::ns('Responses', prefix: true))
			->append(str($this->kind)->plural()->studly())
			->finish('\\');
		
		return $this->name
			->studly()
			->append(str($this->kind)->singular()->studly())
			->finish('Response')
			->prepend($namespace);
	}
	
	/**
	 * @param array<int, string> $names
	 * @return array<int, array<int, string>> Groups of names that differ only by case
	 */
	protected static function collisions(array $names): array
	{
		$by_lowercase = [];
		
		foreach (array_unique($names) as $name) {
			$by_lowercase[strtolower($name)][] = $name;
		}
		
		return array_values(array_filter($by_lowercase, fn($group) => count($group) > 1));
	}
}
