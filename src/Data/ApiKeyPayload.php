<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ApiKeyPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|ApiKey $apiKey, public Optional|bool $success)
	{
	}
}
