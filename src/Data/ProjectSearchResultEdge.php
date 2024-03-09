<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ProjectSearchResult;
class ProjectSearchResultEdge extends Data
{
    function __construct(public Optional|ProjectSearchResult $node, public Optional|string $cursor)
    {
    }
}
