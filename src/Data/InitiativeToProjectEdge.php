<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\InitiativeToProject;
class InitiativeToProjectEdge extends Data
{
    function __construct(public Optional|InitiativeToProject $node, public Optional|string $cursor)
    {
    }
}
