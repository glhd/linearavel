<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\DefinitionNode;
use GraphQL\Language\AST\DirectiveDefinitionNode;
use GraphQL\Language\AST\EnumTypeDefinitionNode;
use GraphQL\Language\AST\InputObjectTypeDefinitionNode;
use GraphQL\Language\AST\InterfaceTypeDefinitionNode;
use GraphQL\Language\AST\NamedTypeNode;
use GraphQL\Language\AST\ObjectTypeDefinitionNode;
use GraphQL\Language\AST\ScalarTypeDefinitionNode;
use GraphQL\Language\AST\UnionTypeDefinitionNode;
use GraphQL\Language\Parser;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class Transformer
{
	/** @var Collection<string, string> GraphQL type name to fully-qualified PHP class name */
	public Collection $registry;
	
	/** @var Collection<string, string> */
	public Collection $scalars;
	
	/** @var Collection<string, array<int, string>> Union name to its member type names */
	public Collection $unions;
	
	/** @var Collection<string, array<int, string>> Type name to the unions it belongs to */
	public Collection $union_members;
	
	public function __construct(
		protected string $filename,
		protected ?Command $command = null,
	) {
		$this->registry = new Collection();
		$this->scalars = new Collection();
		$this->unions = new Collection();
		$this->union_members = new Collection();
		
		require_once __DIR__.'/helpers.php';
		
		app(WriteQueue::class)->withCommand($this->command);
	}
	
	public function write()
	{
		$this->command?->info('Parsing schema...');
		
		$schema = file_get_contents($this->filename);
		
		$definitions = collect(Parser::parse($schema)->definitions);
		
		// PHP class names are case-insensitive, so we need to know about every type
		// in the schema before we can decide what to call any of them
		Taxonomy::resolveCollisions($definitions);
		
		foreach (Taxonomy::aliases() as $graphql_name => $php_name) {
			$this->command?->warn("Renamed '{$graphql_name}' to '{$php_name}' to avoid a class name collision.");
		}
		
		$definitions->each($this->register(...));
		
		// Generation order matters: the code we write is loaded back in as we go
		// (to work out default fields, for example), so anything a class depends
		// on has to exist on disk before that class is written.
		$definitions
			->sortBy($this->order(...))
			->each(fn(DefinitionNode $definition) => match ($definition::class) {
				InterfaceTypeDefinitionNode::class => $this->interface($definition),
				ObjectTypeDefinitionNode::class => $this->class($definition),
				EnumTypeDefinitionNode::class => $this->enum($definition),
				InputObjectTypeDefinitionNode::class => $this->input($definition),
				UnionTypeDefinitionNode::class => $this->union($definition),
				DirectiveDefinitionNode::class => null,
				default => null,
			});
		
		app(PhpStormMetaWriter::class)->write();
	}
	
	/** Contracts and enums first, then data objects, and finally the connector traits. */
	protected function order(DefinitionNode $node): int
	{
		if ($node instanceof ObjectTypeDefinitionNode && in_array($node->name->value, ['Query', 'Mutation'], true)) {
			return 4;
		}
		
		return match ($node::class) {
			InterfaceTypeDefinitionNode::class, UnionTypeDefinitionNode::class => 0,
			EnumTypeDefinitionNode::class => 1,
			InputObjectTypeDefinitionNode::class => 2,
			ObjectTypeDefinitionNode::class => 3,
			default => 5,
		};
	}
	
	public function register(DefinitionNode $node): DefinitionNode
	{
		match ($node::class) {
			InterfaceTypeDefinitionNode::class => $this->registry->put($node->name->value, (string) Taxonomy::make($node)->contract()),
			ObjectTypeDefinitionNode::class => $this->registry->put($node->name->value, (string) Taxonomy::make($node)->data()),
			EnumTypeDefinitionNode::class => $this->registry->put($node->name->value, (string) Taxonomy::make($node)->enum()),
			InputObjectTypeDefinitionNode::class => $this->registry->put($node->name->value, (string) Taxonomy::make($node)->requestInput()),
			UnionTypeDefinitionNode::class => $this->registerUnion($node),
			ScalarTypeDefinitionNode::class => $this->scalars->put($node->name->value, 'string'),
			default => null,
		};
		
		return $node;
	}
	
	/** The member type names of a union, or null if this isn't a union. */
	public function unionMembers(string $name): ?array
	{
		return $this->unions->get($name);
	}
	
	/** The unions that a given type belongs to. */
	public function unionsFor(string $name): array
	{
		return $this->union_members->get($name, []);
	}
	
	protected function registerUnion(UnionTypeDefinitionNode $node): void
	{
		$this->registry->put($node->name->value, (string) Taxonomy::make($node)->contract());
		
		$members = collect($node->types)
			->map(fn(NamedTypeNode $type) => $type->name->value)
			->all();
		
		$this->unions->put($node->name->value, $members);
		
		foreach ($members as $member) {
			$this->union_members->put($member, [...$this->union_members->get($member, []), $node->name->value]);
		}
	}
	
	protected function interface(InterfaceTypeDefinitionNode $node): bool
	{
		InterfaceTransformer::transform($node);
		
		return app(WriteQueue::class)->save();
	}
	
	protected function union(UnionTypeDefinitionNode $node): bool
	{
		UnionTransformer::transform($node);
		
		return app(WriteQueue::class)->save();
	}
	
	protected function class(ObjectTypeDefinitionNode $node): bool
	{
		match ($node->name->value) {
			'Query' => QueryTransformer::transform($node, $this),
			'Mutation' => MutationTransformer::transform($node, $this),
			default => TypeTransformer::transform($node, $this),
		};
		
		return app(WriteQueue::class)->save();
	}
	
	protected function input(InputObjectTypeDefinitionNode $node): bool
	{
		InputTransformer::transform($node, $this);
		
		return app(WriteQueue::class)->save();
	}
	
	protected function enum(EnumTypeDefinitionNode $node): bool
	{
		EnumTransformer::transform($node);
		
		return app(WriteQueue::class)->save();
	}
}
