<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Wrappers\Connection;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Optional;

/** @extends Connection<TimeSchedule> */
class TimeScheduleConnection extends Connection
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
