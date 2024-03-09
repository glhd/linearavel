<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ImageUploadFromUrlPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|string|null $url, public Optional|bool $success)
	{
	}
}
