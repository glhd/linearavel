<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\WorkflowDefinition;
class WorkflowDefinitionEdge extends Data
{
    function __construct(public Optional|WorkflowDefinition $node, public Optional|string $cursor)
    {
    }
}
