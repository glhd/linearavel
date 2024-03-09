<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\IssueSearchResultEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\IssueSearchResult, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class IssueSearchResultConnection extends Data
{
    function __construct(
        /** @var Collection<int, IssueSearchResultEdge> */
        public Optional|Collection $edges,
        /** @var Collection<int, IssueSearchResult> */
        public Optional|Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
