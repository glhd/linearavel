<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ProjectUpdate>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectUpdateConnection
 */
class ProjectUpdateConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ProjectUpdateEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectUpdate> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
