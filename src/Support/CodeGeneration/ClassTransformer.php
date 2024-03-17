<?php

namespace Glhd\Linearavel\Support\CodeGeneration;

use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Use_;
use PhpParser\Node\UseItem;

abstract class ClassTransformer extends InvokableTransformer
{
	protected array $uses = [];
	
	abstract public function __invoke(): array;
	
	public function use(string $fqcn): static
	{
		$this->uses[] = $fqcn;
		
		return $this;
	}
	
	protected function uses(): ?Use_
	{
		if (! count($this->uses)) {
			return null;
		}
		
		$uses = collect($this->uses)
			->unique()
			->map(fn ($fqcn) => new UseItem(new Name($fqcn)))
			->all();
		
		return new Use_($uses);
	}
}
