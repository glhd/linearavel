<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectUpdateInteractionPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|ProjectUpdateInteraction $projectUpdateInteraction, public Optional|bool $success)
	{
	}
}
