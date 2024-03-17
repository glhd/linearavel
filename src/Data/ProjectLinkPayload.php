<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectLinkPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|ProjectLink $projectLink, public Optional|bool $success)
	{
	}
}
