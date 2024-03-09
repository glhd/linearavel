<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Issue;
class IssueEdge extends Data
{
    function __construct(public Optional|Issue $node, public Optional|string $cursor)
    {
    }
}
