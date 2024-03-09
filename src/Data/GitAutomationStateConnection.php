<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\GitAutomationStateEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\GitAutomationState, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class GitAutomationStateConnection extends Data
{
    function __construct(
        /** @var Collection<int, GitAutomationStateEdge> */
        public Collection $edges,
        /** @var Collection<int, GitAutomationState> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
