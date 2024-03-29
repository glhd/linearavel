<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AttachmentPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|Attachment $attachment, public Optional|bool $success)
	{
	}
}
