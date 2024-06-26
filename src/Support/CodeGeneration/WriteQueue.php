<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use GraphQL\Language\AST\DefinitionNode;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use PhpParser\PrettyPrinter;

class WriteQueue
{
	public function __construct(
		/** @var Collection<int, \Glhd\Linearavel\Support\CodeGeneration\PendingFile> $queue */
		protected Collection $queue = new Collection(),
	) {
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
	
	public function addFromNode(DefinitionNode $node, array $tree): static
	{
		return $this->add(PendingFile::fromNode($node, $tree));
	}
	
	public function add(PendingFile $transformation): static
	{
		$this->queue->push($transformation);
		
		return $this;
	}
	
	public function save(): bool
	{
		$this->printer ??= new PrettyPrinter\Standard();
		
		foreach ($this->queue as $transformation) {
			if (! $transformation->withCommand($this->command)->withPrinter($this->printer)->save()) {
				return false;
			}
		}
		
		$this->queue = new Collection();
		
		return true;
	}
}
