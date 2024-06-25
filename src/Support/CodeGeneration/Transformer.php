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

class Transformer
{
	public Collection $registry;
	
	public Collection $scalars;
	
	public function __construct(
		protected string $filename,
		public string $namespace = 'Glhd\\Linearavel\\',
		protected ?Command $command = null,
	) {
		$this->registry = new Collection();
		$this->scalars = new Collection();
		
		app(PendingTransformationQueue::class)->withCommand($this->command);
		
		// $debugging = true;
		
		if (isset($debugging)) {
			$debug = <<<'PHP'
			<?php
			namespace PHPSTORM_META {
				expectedArguments(
					\Glhd\Linearavel\Requests\Pending\Queries\PendingIssuesRequest::get(),
					0,
					'edges.node.id', 'edges.node.createdAt'
				);
			}
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
				InterfaceTypeDefinitionNode::class => $this->interface($definition),
				ObjectTypeDefinitionNode::class => $this->class($definition),
				EnumTypeDefinitionNode::class => $this->enum($definition),
				InputObjectTypeDefinitionNode::class => $this->input($definition),
				UnionTypeDefinitionNode::class => null, // TODO
				DirectiveDefinitionNode::class => null,
				default => null,
			});
		
		app(PhpStormMetaWriter::class)->write();
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
		InterfaceTransformer::transform($node, $this->namespace);
		
		return app(PendingTransformationQueue::class)->save();
	}
	
	protected function class(ObjectTypeDefinitionNode $node): bool
	{
		match ($node->name->value) {
			'Query' => QueryTransformer::transform($node, $this),
			'Mutation' => MutationTransformer::transform($node, $this),
			default => TypeTransformer::transform($node, $this),
		};
		
		return app(PendingTransformationQueue::class)->save();
	}
	
	protected function input(InputObjectTypeDefinitionNode $node): bool
	{
		InputTransformer::transform($node, $this);
		
		return app(PendingTransformationQueue::class)->save();
	}
	
	protected function enum(EnumTypeDefinitionNode $node): bool
	{
		EnumTransformer::transform($node, $this->namespace);
		
		return app(PendingTransformationQueue::class)->save();
	}
}
