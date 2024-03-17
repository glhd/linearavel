<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UploadPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|UploadFile|null $uploadFile = null, public Optional|bool $success)
	{
	}
}
