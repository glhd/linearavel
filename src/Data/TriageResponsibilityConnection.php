<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TriageResponsibilityConnection extends Data
{
	function __construct(
		/** @var Collection<int, TriageResponsibilityEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, TriageResponsibility> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
