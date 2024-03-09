<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\UserEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\User, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class UserConnection extends Data
{
    function __construct(
        /** @var Collection<int, UserEdge> */
        public Collection $edges,
        /** @var Collection<int, User> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
