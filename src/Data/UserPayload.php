<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|User|null $user = null, public Optional|bool $success)
	{
	}
}
