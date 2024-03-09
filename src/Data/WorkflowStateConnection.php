<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WorkflowStateConnection extends Data
{
	function __construct(
		/** @var Collection<int, WorkflowStateEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, WorkflowState> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
