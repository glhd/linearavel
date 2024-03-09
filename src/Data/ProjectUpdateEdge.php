<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ProjectUpdate;
class ProjectUpdateEdge extends Data
{
    function __construct(public Optional|ProjectUpdate $node, public Optional|string $cursor)
    {
    }
}
