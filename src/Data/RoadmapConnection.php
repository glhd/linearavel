<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RoadmapConnection extends Data
{
	function __construct(
		/** @var Collection<int, RoadmapEdge> */
		public Collection $edges,
		/** @var Collection<int, Roadmap> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
