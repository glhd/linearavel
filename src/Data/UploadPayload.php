<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UploadPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|UploadFile|null $uploadFile, public Optional|bool $success)
	{
	}
}
