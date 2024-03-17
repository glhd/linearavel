<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RoadmapToProjectPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|RoadmapToProject $roadmapToProject, public Optional|bool $success)
	{
	}
}
