<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ProjectLabel>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectLabelConnection
 */
class ProjectLabelConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ProjectLabelEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectLabel> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
