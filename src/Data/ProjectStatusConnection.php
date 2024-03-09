<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\ProjectStatusEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\ProjectStatus, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class ProjectStatusConnection extends Data
{
    function __construct(
        /** @var Collection<int, ProjectStatusEdge> */
        public Collection $edges,
        /** @var Collection<int, ProjectStatus> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
