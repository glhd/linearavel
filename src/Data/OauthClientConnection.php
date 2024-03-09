<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\OauthClientEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\OauthClient, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class OauthClientConnection extends Data
{
    function __construct(
        /** @var Collection<int, OauthClientEdge> */
        public Collection $edges,
        /** @var Collection<int, OauthClient> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
