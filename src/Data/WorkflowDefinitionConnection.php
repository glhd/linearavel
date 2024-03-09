<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WorkflowDefinitionConnection extends Data
{
	function __construct(
		/** @var Collection<int, WorkflowDefinitionEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, WorkflowDefinition> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
