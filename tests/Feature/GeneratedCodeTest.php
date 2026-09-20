<?php

namespace Glhd\Linearavel\Tests\Feature;

use Glhd\Linearavel\Support\CodeGeneration\Taxonomy;
use Glhd\Linearavel\Tests\TestCase;
use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\InputObjectTypeDefinitionNode;
use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\AST\UnionTypeDefinitionNode;
use GraphQL\Language\Parser;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use ReflectionNamedType;
use SplFileInfo;

/**
 * The bulk of this package is generated from Linear's GraphQL schema. These tests
 * guard the generated tree as a whole, so that a schema change cannot quietly
 * produce code that does not load.
 */
class GeneratedCodeTest extends TestCase
{
	public function test_every_class_in_the_package_loads(): void
	{
		$classes = $this->classes();
		
		$this->assertGreaterThan(1_000, count($classes), 'Expected the generated tree to be present.');
		
		foreach ($classes as $fqcn) {
			$this->assertTrue(
				class_exists($fqcn) || interface_exists($fqcn) || enum_exists($fqcn) || trait_exists($fqcn),
				"'{$fqcn}' does not autoload. Check that its file name matches its class name."
			);
		}
	}
	
	public function test_no_class_references_a_type_that_does_not_exist(): void
	{
		$missing = [];
		
		foreach ($this->classes() as $fqcn) {
			$reflection = new ReflectionClass($fqcn);
			
			$types = collect($reflection->getMethods())
				->filter(fn($method) => $method->getDeclaringClass()->getName() === $fqcn)
				->flatMap(fn($method) => [$method->getReturnType(), ...array_map(fn($p) => $p->getType(), $method->getParameters())]);
			
			foreach ($types as $type) {
				foreach ($this->namedTypes($type) as $name) {
					if (! class_exists($name) && ! interface_exists($name) && ! enum_exists($name)) {
						$missing[] = "{$fqcn} refers to {$name}";
					}
				}
			}
		}
		
		$this->assertSame([], $missing);
	}
	
	public function test_every_type_in_the_schema_has_a_class(): void
	{
		$definitions = collect(Parser::parse(file_get_contents($this->schemaPath()))->definitions);
		
		Taxonomy::resolveCollisions($definitions);
		
		$missing = [];
		
		foreach ($definitions as $definition) {
			if (! isset($definition->name) || in_array($definition->name->value, ['Query', 'Mutation'], true)) {
				continue;
			}
			
			$taxonomy = Taxonomy::make($definition);
			
			$expected = match ($definition::class) {
				ObjectTypeDefinitionNode::class => (string) $taxonomy->data(),
				EnumTypeDefinitionNode::class => (string) $taxonomy->enum(),
				InputObjectTypeDefinitionNode::class => (string) $taxonomy->requestInput(),
				InterfaceTypeDefinitionNode::class, UnionTypeDefinitionNode::class => (string) $taxonomy->contract(),
				default => null,
			};
			
			if ($expected && ! class_exists($expected) && ! interface_exists($expected) && ! enum_exists($expected)) {
				$missing[] = "{$definition->name->value} => {$expected}";
			}
		}
		
		$this->assertSame([], $missing, 'Some schema types have no generated class. Re-run `composer generate-data`.');
	}
	
	public function test_no_two_files_differ_only_by_case(): void
	{
		$collisions = collect($this->files())
			->groupBy(fn(string $path) => strtolower($path))
			->filter(fn($group) => $group->count() > 1)
			->keys()
			->all();
		
		$this->assertSame([], $collisions, 'PHP class names are case-insensitive, so these files cannot coexist.');
	}
	
	protected function schemaPath(): string
	{
		return dirname(__DIR__, 2).'/local.graphql';
	}
	
	/** @return array<int, string> */
	protected function files(): array
	{
		$base = dirname(__DIR__, 2).'/src';
		$files = [];
		
		foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($base)) as $file) {
			assert($file instanceof SplFileInfo);
			
			if ($file->isFile() && 'php' === $file->getExtension()) {
				$files[] = substr($file->getPathname(), strlen($base) + 1);
			}
		}
		
		sort($files);
		
		return $files;
	}
	
	/** @return array<int, class-string> */
	protected function classes(): array
	{
		return collect($this->files())
			->reject(fn(string $path) => 'helpers.php' === basename($path))
			->map(fn(string $path) => 'Glhd\\Linearavel\\'.str_replace('/', '\\', substr($path, 0, -4)))
			->values()
			->all();
	}
	
	/** @return array<int, string> */
	protected function namedTypes(mixed $type): array
	{
		if (null === $type) {
			return [];
		}
		
		$types = $type instanceof ReflectionNamedType ? [$type] : $type->getTypes();
		
		return collect($types)
			->filter(fn($type) => $type instanceof ReflectionNamedType && ! $type->isBuiltin())
			->map(fn($type) => $type->getName())
			->reject(fn(string $name) => in_array($name, ['static', 'self', 'parent'], true))
			->values()
			->all();
	}
}
