<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\WorkflowCronJobDefinitionEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\WorkflowCronJobDefinition, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class WorkflowCronJobDefinitionConnection extends Data
{
    function __construct(
        /** @var Collection<int, WorkflowCronJobDefinitionEdge> */
        public Optional|Collection $edges,
        /** @var Collection<int, WorkflowCronJobDefinition> */
        public Optional|Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
