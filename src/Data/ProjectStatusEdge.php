<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ProjectStatus;
class ProjectStatusEdge extends Data
{
    function __construct(public Optional|ProjectStatus $node, public Optional|string $cursor)
    {
    }
}
