<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\WorkflowStateEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\WorkflowState, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class WorkflowStateConnection extends Data
{
    function __construct(
        /** @var Collection<int, WorkflowStateEdge> */
        public Collection $edges,
        /** @var Collection<int, WorkflowState> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
