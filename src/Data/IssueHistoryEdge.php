<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\IssueHistory;
class IssueHistoryEdge extends Data
{
    function __construct(public Optional|IssueHistory $node, public Optional|string $cursor)
    {
    }
}
