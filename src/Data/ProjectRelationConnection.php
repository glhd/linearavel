<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ProjectRelation>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectRelationConnection
 */
class ProjectRelationConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ProjectRelationEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectRelation> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
