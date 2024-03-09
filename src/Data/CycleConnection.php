<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CycleConnection extends Data
{
	function __construct(
		/** @var Collection<int, CycleEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, Cycle> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
