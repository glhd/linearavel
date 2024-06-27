<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<RoadmapToProject>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/RoadmapToProjectConnection
 */
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
