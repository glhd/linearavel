<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\ApiKeyEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\ApiKey, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class ApiKeyConnection extends Data
{
    function __construct(
        /** @var Collection<int, ApiKeyEdge> */
        public Collection $edges,
        /** @var Collection<int, ApiKey> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
