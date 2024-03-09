<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectMilestonePayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|ProjectMilestone $projectMilestone, public Optional|bool $success)
	{
	}
}
