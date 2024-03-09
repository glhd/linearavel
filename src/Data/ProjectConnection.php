<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\ProjectEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Project, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class ProjectConnection extends Data
{
    function __construct(
        /** @var Collection<int, ProjectEdge> */
        public Collection $edges,
        /** @var Collection<int, Project> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
