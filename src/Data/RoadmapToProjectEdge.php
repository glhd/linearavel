<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RoadmapToProjectEdge extends Data
{
	public function __construct(public Optional|RoadmapToProject $node, public Optional|string $cursor)
	{
	}
}
