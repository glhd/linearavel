<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\IssueSearchResult;
class IssueSearchResultEdge extends Data
{
    function __construct(public Optional|IssueSearchResult $node, public Optional|string $cursor)
    {
    }
}
