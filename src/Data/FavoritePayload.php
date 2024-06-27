<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/FavoritePayload */
class FavoritePayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|Favorite $favorite, public Optional|bool $success)
	{
	}
}
