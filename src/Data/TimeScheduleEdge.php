<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\TimeSchedule;
class TimeScheduleEdge extends Data
{
    function __construct(public Optional|TimeSchedule $node, public Optional|string $cursor)
    {
    }
}
