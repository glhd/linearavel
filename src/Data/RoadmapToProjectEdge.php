<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\RoadmapToProject;
class RoadmapToProjectEdge extends Data
{
    function __construct(public Optional|RoadmapToProject $node, public Optional|string $cursor)
    {
    }
}
