<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\InitiativeToProjectEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\InitiativeToProject, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class InitiativeToProjectConnection extends Data
{
    function __construct(
        /** @var Collection<int, InitiativeToProjectEdge> */
        public Optional|Collection $edges,
        /** @var Collection<int, InitiativeToProject> */
        public Optional|Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
