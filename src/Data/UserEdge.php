<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserEdge extends Data
{
	function __construct(public Optional|User $node, public Optional|string $cursor)
	{
	}
}
