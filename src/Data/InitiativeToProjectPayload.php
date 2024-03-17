<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class InitiativeToProjectPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|InitiativeToProject $initiativeToProject, public Optional|bool $success)
	{
	}
}
