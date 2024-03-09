<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ExternalUser;
class ExternalUserEdge extends Data
{
    function __construct(public Optional|ExternalUser $node, public Optional|string $cursor)
    {
    }
}
