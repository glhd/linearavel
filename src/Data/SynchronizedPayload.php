<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class SynchronizedPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId)
	{
	}
}
