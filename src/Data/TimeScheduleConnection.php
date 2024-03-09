<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\TimeScheduleEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\TimeSchedule, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class TimeScheduleConnection extends Data
{
    function __construct(
        /** @var Collection<int, TimeScheduleEdge> */
        public Collection $edges,
        /** @var Collection<int, TimeSchedule> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
