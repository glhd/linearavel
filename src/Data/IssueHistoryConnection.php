<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\IssueHistoryEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\IssueHistory, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class IssueHistoryConnection extends Data
{
    function __construct(
        /** @var Collection<int, IssueHistoryEdge> */
        public Collection $edges,
        /** @var Collection<int, IssueHistory> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
