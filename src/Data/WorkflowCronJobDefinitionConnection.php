<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/**
 * @extends Connection<WorkflowCronJobDefinition>
 * @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/WorkflowCronJobDefinitionConnection
 */
class WorkflowCronJobDefinitionConnection extends Connection
{
	public function __construct(
		/** @var Collection<int, WorkflowCronJobDefinitionEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, WorkflowCronJobDefinition> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
