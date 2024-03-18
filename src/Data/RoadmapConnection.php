<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<Roadmap> */
class RoadmapConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, RoadmapEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Roadmap> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
