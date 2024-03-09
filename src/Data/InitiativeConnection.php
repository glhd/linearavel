<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\InitiativeEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Initiative, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class InitiativeConnection extends Data
{
    function __construct(
        /** @var Collection<int, InitiativeEdge> */
        public Collection $edges,
        /** @var Collection<int, Initiative> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
