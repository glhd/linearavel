<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\WorkflowState;
class WorkflowStateEdge extends Data
{
    function __construct(public Optional|WorkflowState $node, public Optional|string $cursor)
    {
    }
}
