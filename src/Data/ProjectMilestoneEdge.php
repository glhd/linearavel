<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ProjectMilestone;
class ProjectMilestoneEdge extends Data
{
    function __construct(public Optional|ProjectMilestone $node, public Optional|string $cursor)
    {
    }
}
