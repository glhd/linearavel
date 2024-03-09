<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\ProjectUpdateEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\ProjectUpdate, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class ProjectUpdateConnection extends Data
{
    function __construct(
        /** @var Collection<int, ProjectUpdateEdge> */
        public Collection $edges,
        /** @var Collection<int, ProjectUpdate> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
