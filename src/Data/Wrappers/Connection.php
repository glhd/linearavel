<?php

namespace Glhd\Linearavel\Data\Wrappers;

use BadMethodCallException;
use Illuminate\Support\Collection;
use Illuminate\Support\Traits\ForwardsCalls;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

abstract class Connection extends Data
{
	use ForwardsCalls;
	
	public Optional|Collection $edges;
	
	public function __call(string $name, array $arguments)
	{
		if ($this->edges instanceof Optional) {
			throw new BadMethodCallException('You must request edge data before you can use it.');
		}
		
		return $this->forwardDecoratedCallTo($this->edges, $name, $arguments);
	}
}
