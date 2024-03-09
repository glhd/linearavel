<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TemplatePayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|Template $template, public Optional|bool $success)
	{
	}
}
