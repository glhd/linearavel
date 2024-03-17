<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GitAutomationStatePayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|GitAutomationState $gitAutomationState, public Optional|bool $success)
	{
	}
}
