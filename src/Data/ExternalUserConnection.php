<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\ExternalUserEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\ExternalUser, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class ExternalUserConnection extends Data
{
    function __construct(
        /** @var Collection<int, ExternalUserEdge> */
        public Collection $edges,
        /** @var Collection<int, ExternalUser> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
