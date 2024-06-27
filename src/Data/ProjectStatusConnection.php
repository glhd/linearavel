<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ProjectStatus>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectStatusConnection
 */
class ProjectStatusConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ProjectStatusEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectStatus> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
