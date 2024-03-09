<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ProjectLink;
class ProjectLinkEdge extends Data
{
    function __construct(public Optional|ProjectLink $node, public Optional|string $cursor)
    {
    }
}
