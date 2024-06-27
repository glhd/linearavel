<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/UserSettingsFlagPayload */
class UserSettingsFlagPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|string $flag, public Optional|int $value, public Optional|bool $success)
	{
	}
}
