<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\WorkflowCronJobDefinitionEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\WorkflowCronJobDefinition, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class WorkflowCronJobDefinitionConnection extends Data
{
    function __construct(
        /** @var Collection<int, WorkflowCronJobDefinitionEdge> */
        public Collection $edges,
        /** @var Collection<int, WorkflowCronJobDefinition> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
