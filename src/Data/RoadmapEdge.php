<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RoadmapEdge extends Data
{
	function __construct(public Optional|Roadmap $node, public Optional|string $cursor)
	{
	}
}
