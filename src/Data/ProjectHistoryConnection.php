<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<ProjectHistory>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectHistoryConnection
 */
class ProjectHistoryConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, ProjectHistoryEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, ProjectHistory> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
