<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Favorite;
class FavoriteEdge extends Data
{
    function __construct(public Optional|Favorite $node, public Optional|string $cursor)
    {
    }
}
