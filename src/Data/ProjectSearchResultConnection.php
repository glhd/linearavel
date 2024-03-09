<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\ProjectSearchResultEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\ProjectSearchResult, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class ProjectSearchResultConnection extends Data
{
    function __construct(
        /** @var Collection<int, ProjectSearchResultEdge> */
        public Collection $edges,
        /** @var Collection<int, ProjectSearchResult> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
