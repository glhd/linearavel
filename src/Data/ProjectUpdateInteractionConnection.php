<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ProjectUpdateInteraction>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectUpdateInteractionConnection
 */
class ProjectUpdateInteractionConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ProjectUpdateInteractionEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectUpdateInteraction> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
