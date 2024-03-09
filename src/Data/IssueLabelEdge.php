<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\IssueLabel;
class IssueLabelEdge extends Data
{
    function __construct(public Optional|IssueLabel $node, public Optional|string $cursor)
    {
    }
}
