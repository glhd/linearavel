<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\TeamEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Team, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class TeamConnection extends Data
{
    function __construct(
        /** @var Collection<int, TeamEdge> */
        public Collection $edges,
        /** @var Collection<int, Team> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
