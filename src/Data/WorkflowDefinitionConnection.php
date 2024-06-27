<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<WorkflowDefinition>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/WorkflowDefinitionConnection
 */
class WorkflowDefinitionConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, WorkflowDefinitionEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, WorkflowDefinition> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
