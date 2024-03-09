<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Reaction;
class ReactionEdge extends Data
{
    function __construct(public Optional|Reaction $node, public Optional|string $cursor)
    {
    }
}
