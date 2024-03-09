<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TimeScheduleEdge extends Data
{
	function __construct(public Optional|TimeSchedule $node, public Optional|string $cursor)
	{
	}
}
