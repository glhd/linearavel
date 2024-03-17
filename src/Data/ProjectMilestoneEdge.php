<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectMilestoneEdge extends Data
{
	public function __construct(public Optional|ProjectMilestone $node, public Optional|string $cursor)
	{
	}
}
