<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\RoadmapToProjectEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\RoadmapToProject, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class RoadmapToProjectConnection extends Data
{
    function __construct(
        /** @var Collection<int, RoadmapToProjectEdge> */
        public Collection $edges,
        /** @var Collection<int, RoadmapToProject> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
