<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class DocumentPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|Document $document, public Optional|bool $success)
	{
	}
}
