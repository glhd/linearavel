<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\FacetEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Facet, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class FacetConnection extends Data
{
    function __construct(
        /** @var Collection<int, FacetEdge> */
        public Collection $edges,
        /** @var Collection<int, Facet> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
