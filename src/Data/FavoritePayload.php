<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Favorite;
class FavoritePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Favorite $favorite, public Optional|bool $success)
    {
    }
}
