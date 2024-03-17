<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectUpdateWithInteractionPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|ProjectUpdate $projectUpdate, public Optional|bool $success, public Optional|ProjectUpdateInteraction $interaction)
	{
	}
}
