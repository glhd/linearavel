<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectLinkPayload */
class ProjectLinkPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|ProjectLink $projectLink, public Optional|bool $success)
	{
	}
}
