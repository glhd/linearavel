<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ViewPreferencesPayload */
class ViewPreferencesPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|ViewPreferences $viewPreferences, public Optional|bool $success)
	{
	}
}
