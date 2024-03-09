<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TriageResponsibilityPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|TriageResponsibility $triageResponsibility, public Optional|bool $success)
	{
	}
}
