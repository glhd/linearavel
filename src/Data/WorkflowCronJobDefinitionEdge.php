<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\WorkflowCronJobDefinition;
class WorkflowCronJobDefinitionEdge extends Data
{
    function __construct(public Optional|WorkflowCronJobDefinition $node, public Optional|string $cursor)
    {
    }
}
