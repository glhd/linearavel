<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\ProjectMilestoneEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\ProjectMilestone, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class ProjectMilestoneConnection extends Data
{
    function __construct(
        /** @var Collection<int, ProjectMilestoneEdge> */
        public Optional|Collection $edges,
        /** @var Collection<int, ProjectMilestone> */
        public Optional|Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
