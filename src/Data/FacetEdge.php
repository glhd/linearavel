<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Facet;
class FacetEdge extends Data
{
    function __construct(public Optional|Facet $node, public Optional|string $cursor)
    {
    }
}
