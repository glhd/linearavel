<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectMilestoneConnection extends Data
{
	function __construct(
		/** @var Collection<int, ProjectMilestoneEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectMilestone> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
