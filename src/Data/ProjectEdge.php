<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Project;
class ProjectEdge extends Data
{
    function __construct(public Optional|Project $node, public Optional|string $cursor)
    {
    }
}
