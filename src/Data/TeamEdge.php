<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TeamEdge extends Data
{
	public function __construct(public Optional|Team $node, public Optional|string $cursor)
	{
	}
}
