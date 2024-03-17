<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserSettingsPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|UserSettings $userSettings, public Optional|bool $success)
	{
	}
}
