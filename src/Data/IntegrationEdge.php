<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Integration;
class IntegrationEdge extends Data
{
    function __construct(public Optional|Integration $node, public Optional|string $cursor)
    {
    }
}
