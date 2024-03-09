<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Cycle;
class CycleEdge extends Data
{
    function __construct(public Optional|Cycle $node, public Optional|string $cursor)
    {
    }
}
