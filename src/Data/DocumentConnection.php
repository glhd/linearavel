<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\DocumentEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Document, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class DocumentConnection extends Data
{
    function __construct(
        /** @var Collection<int, DocumentEdge> */
        public Collection $edges,
        /** @var Collection<int, Document> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
