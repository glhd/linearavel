<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\ReactionEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Reaction, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class ReactionConnection extends Data
{
    function __construct(
        /** @var Collection<int, ReactionEdge> */
        public Collection $edges,
        /** @var Collection<int, Reaction> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
