<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TimeScheduleConnection extends Data
{
	public function __construct(
		/** @var Collection<int, TimeScheduleEdge> */
		public Optional|Collection $edges,
		/** @var Collection<int, TimeSchedule> */
		public Optional|Collection $nodes,
		public Optional|PageInfo $pageInfo
	) {
	}
}
