<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CyclePayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|Cycle|null $cycle, public Optional|bool $success)
	{
	}
}
