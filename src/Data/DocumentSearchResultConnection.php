<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\DocumentSearchResultEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\DocumentSearchResult, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class DocumentSearchResultConnection extends Data
{
    function __construct(
        /** @var Collection<int, DocumentSearchResultEdge> */
        public Collection $edges,
        /** @var Collection<int, DocumentSearchResult> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
