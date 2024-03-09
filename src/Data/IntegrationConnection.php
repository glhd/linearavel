<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\IntegrationEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Integration, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class IntegrationConnection extends Data
{
    function __construct(
        /** @var Collection<int, IntegrationEdge> */
        public Collection $edges,
        /** @var Collection<int, Integration> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
