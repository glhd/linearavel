<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\ArchivePayload;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RoadmapArchivePayload extends Data implements ArchivePayload
{
	public function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Roadmap|null $entity = null)
	{
	}
}
