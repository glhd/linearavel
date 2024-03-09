<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ApiKey;
class ApiKeyEdge extends Data
{
    function __construct(public Optional|ApiKey $node, public Optional|string $cursor)
    {
    }
}
