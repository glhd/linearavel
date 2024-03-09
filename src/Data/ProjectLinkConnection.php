<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\ProjectLinkEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\ProjectLink, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class ProjectLinkConnection extends Data
{
    function __construct(
        /** @var Collection<int, ProjectLinkEdge> */
        public Collection $edges,
        /** @var Collection<int, ProjectLink> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
