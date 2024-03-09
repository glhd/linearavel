<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\CustomViewEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\CustomView, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class CustomViewConnection extends Data
{
    function __construct(
        /** @var Collection<int, CustomViewEdge> */
        public Collection $edges,
        /** @var Collection<int, CustomView> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
