<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\DefinitionNode;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use PhpParser\PrettyPrinter;

class PendingTransformationQueue
{
	public function __construct(
		/** @var Collection<int, \Glhd\Linearavel\Support\CodeGeneration\PendingTransformation> $queue */
		protected Collection $queue = new Collection(),
		protected PrettyPrinter $printer = new PrettyPrinter\Standard(),
		protected ?Command $command = null,
	) {
	}
	
	public function addFromNode(DefinitionNode $node, array $tree): static
	{
		return $this->add(PendingTransformation::fromNode($node, $tree));
	}
	
	public function add(PendingTransformation $transformation): static
	{
		$this->queue->push($transformation);
		
		return $this;
	}
	
	public function save(): bool
	{
		foreach ($this->queue as $transformation) {
			if (! $transformation->withCommand($this->command)->withPrinter($this->printer)->save()) {
				return false;
			}
		}
		
		$this->queue = new Collection();
		
		return true;
	}
}
