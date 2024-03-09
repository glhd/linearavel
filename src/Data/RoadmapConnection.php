<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\RoadmapEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Roadmap, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class RoadmapConnection extends Data
{
    function __construct(
        /** @var Collection<int, RoadmapEdge> */
        public Collection $edges,
        /** @var Collection<int, Roadmap> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
