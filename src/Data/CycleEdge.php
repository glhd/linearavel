<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CycleEdge extends Data
{
	function __construct(public Optional|Cycle $node, public Optional|string $cursor)
	{
	}
}
