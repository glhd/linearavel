<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<WorkflowState>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/WorkflowStateConnection
 */
class WorkflowStateConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, WorkflowStateEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, WorkflowState> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
