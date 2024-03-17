<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WorkflowCronJobDefinitionConnection extends Data
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
