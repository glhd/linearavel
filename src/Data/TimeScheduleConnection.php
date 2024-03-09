<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TimeScheduleConnection extends Data
{
	function __construct(
		/** @var Collection<int, TimeScheduleEdge> */
		public Collection $edges,
		/** @var Collection<int, TimeSchedule> */
		public Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
