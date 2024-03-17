<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class AttachmentSourcesPayload extends Data
{
	public function __construct(public Optional|string $sources)
	{
	}
}
