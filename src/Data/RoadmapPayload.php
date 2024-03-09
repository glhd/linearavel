<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RoadmapPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|Roadmap $roadmap, public Optional|bool $success)
	{
	}
}
