<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\TeamMembershipEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\TeamMembership, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class TeamMembershipConnection extends Data
{
    function __construct(
        /** @var Collection<int, TeamMembershipEdge> */
        public Collection $edges,
        /** @var Collection<int, TeamMembership> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
