<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\GitAutomationState;
class GitAutomationStateEdge extends Data
{
    function __construct(public Optional|GitAutomationState $node, public Optional|string $cursor)
    {
    }
}
