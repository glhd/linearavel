<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\FavoriteEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Favorite, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class FavoriteConnection extends Data
{
    function __construct(
        /** @var Collection<int, FavoriteEdge> */
        public Collection $edges,
        /** @var Collection<int, Favorite> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
