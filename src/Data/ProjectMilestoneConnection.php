<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ProjectMilestone>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectMilestoneConnection
 */
class ProjectMilestoneConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ProjectMilestoneEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectMilestone> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
