<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|Project|null $project = null, public Optional|bool $success)
	{
	}
}
