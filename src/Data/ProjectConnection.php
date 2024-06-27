<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<Project>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectConnection
 */
class ProjectConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ProjectEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Project> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
