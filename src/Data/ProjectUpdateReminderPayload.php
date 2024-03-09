<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectUpdateReminderPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|bool $success)
	{
	}
}
