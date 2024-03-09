<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class InitiativeEdge extends Data
{
	function __construct(public Optional|Initiative $node, public Optional|string $cursor)
	{
	}
}
