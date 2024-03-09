<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TeamPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|Team|null $team, public Optional|bool $success)
	{
	}
}
