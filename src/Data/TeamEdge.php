<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Team;
class TeamEdge extends Data
{
    function __construct(public Optional|Team $node, public Optional|string $cursor)
    {
    }
}
