<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GitAutomationStateConnection extends Data
{
	function __construct(
		/** @var Collection<int, GitAutomationStateEdge> */
		public Collection $edges,
		/** @var Collection<int, GitAutomationState> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
