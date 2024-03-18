<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<RoadmapToProject> */
class RoadmapToProjectConnection extends Connection
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
