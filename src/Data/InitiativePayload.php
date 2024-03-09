<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class InitiativePayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|Initiative $initiative, public Optional|bool $success)
	{
	}
}
