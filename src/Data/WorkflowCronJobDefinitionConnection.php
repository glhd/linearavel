<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WorkflowCronJobDefinitionConnection extends Data
{
	function __construct(
		/** @var Collection<int, WorkflowCronJobDefinitionEdge> */
		public Collection $edges,
		/** @var Collection<int, WorkflowCronJobDefinition> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
