<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ReactionEdge extends Data
{
	public function __construct(public Optional|Reaction $node, public Optional|string $cursor)
	{
	}
}
