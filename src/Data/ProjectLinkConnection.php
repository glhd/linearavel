<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ProjectLink>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectLinkConnection
 */
class ProjectLinkConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ProjectLinkEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectLink> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
