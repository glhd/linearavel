<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RoadmapToProjectConnection extends Data
{
	function __construct(
		/** @var Collection<int, RoadmapToProjectEdge> */
		public Collection $edges,
		/** @var Collection<int, RoadmapToProject> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
