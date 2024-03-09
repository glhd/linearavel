<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ProjectUpdateInteraction;
class ProjectUpdateInteractionEdge extends Data
{
    function __construct(public Optional|ProjectUpdateInteraction $node, public Optional|string $cursor)
    {
    }
}
