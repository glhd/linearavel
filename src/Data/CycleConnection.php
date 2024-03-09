<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\CycleEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Cycle, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class CycleConnection extends Data
{
    function __construct(
        /** @var Collection<int, CycleEdge> */
        public Collection $edges,
        /** @var Collection<int, Cycle> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
