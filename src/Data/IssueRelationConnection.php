<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\IssueRelationEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\IssueRelation, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class IssueRelationConnection extends Data
{
    function __construct(
        /** @var Collection<int, IssueRelationEdge> */
        public Collection $edges,
        /** @var Collection<int, IssueRelation> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
