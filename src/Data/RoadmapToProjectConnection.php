<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RoadmapToProjectConnection extends Data
{
	public function __construct(
		/** @var Collection<int, RoadmapToProjectEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, RoadmapToProject> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
