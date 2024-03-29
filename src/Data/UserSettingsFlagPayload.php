<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserSettingsFlagPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|string $flag, public Optional|int $value, public Optional|bool $success)
	{
	}
}
