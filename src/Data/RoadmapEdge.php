<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Roadmap;
class RoadmapEdge extends Data
{
    function __construct(public Optional|Roadmap $node, public Optional|string $cursor)
    {
    }
}
