<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\TriageResponsibilityEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\TriageResponsibility, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class TriageResponsibilityConnection extends Data
{
    function __construct(
        /** @var Collection<int, TriageResponsibilityEdge> */
        public Collection $edges,
        /** @var Collection<int, TriageResponsibility> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
