<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\IssueEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Issue, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class IssueConnection extends Data
{
    function __construct(
        /** @var Collection<int, IssueEdge> */
        public Collection $edges,
        /** @var Collection<int, Issue> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
