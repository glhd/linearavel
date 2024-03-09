<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\DocumentSearchResult;
class DocumentSearchResultEdge extends Data
{
    function __construct(public Optional|DocumentSearchResult $node, public Optional|string $cursor)
    {
    }
}
