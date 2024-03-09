<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\WorkflowDefinitionEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\WorkflowDefinition, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class WorkflowDefinitionConnection extends Data
{
    function __construct(
        /** @var Collection<int, WorkflowDefinitionEdge> */
        public Collection $edges,
        /** @var Collection<int, WorkflowDefinition> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
