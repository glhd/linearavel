<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\ProjectUpdateInteractionEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\ProjectUpdateInteraction, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class ProjectUpdateInteractionConnection extends Data
{
    function __construct(
        /** @var Collection<int, ProjectUpdateInteractionEdge> */
        public Optional|Collection $edges,
        /** @var Collection<int, ProjectUpdateInteraction> */
        public Optional|Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
