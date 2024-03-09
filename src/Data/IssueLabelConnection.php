<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\IssueLabelEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\IssueLabel, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class IssueLabelConnection extends Data
{
    function __construct(
        /** @var Collection<int, IssueLabelEdge> */
        public Collection $edges,
        /** @var Collection<int, IssueLabel> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
