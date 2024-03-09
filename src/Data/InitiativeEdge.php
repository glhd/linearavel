<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Initiative;
class InitiativeEdge extends Data
{
    function __construct(public Optional|Initiative $node, public Optional|string $cursor)
    {
    }
}
