<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\OauthClient;
class OauthClientEdge extends Data
{
    function __construct(public Optional|OauthClient $node, public Optional|string $cursor)
    {
    }
}
