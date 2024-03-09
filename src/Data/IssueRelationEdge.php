<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\IssueRelation;
class IssueRelationEdge extends Data
{
    function __construct(public Optional|IssueRelation $node, public Optional|string $cursor)
    {
    }
}
