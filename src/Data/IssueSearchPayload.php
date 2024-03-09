<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\IssueSearchResultEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\IssueSearchResult, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo, Glhd\Linearavel\Data\ArchiveResponse;
class IssueSearchPayload extends Data
{
    function __construct(
        /** @var Collection<int, IssueSearchResultEdge> */
        public Collection $edges,
        /** @var Collection<int, IssueSearchResult> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo,
        public Optional|ArchiveResponse $archivePayload,
        public Optional|float $totalCount
    )
    {
    }
}
