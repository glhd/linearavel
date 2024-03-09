<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\User;
class UserEdge extends Data
{
    function __construct(public Optional|User $node, public Optional|string $cursor)
    {
    }
}
