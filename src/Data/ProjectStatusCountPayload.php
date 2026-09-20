<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectStatusCountPayload */
class ProjectStatusCountPayload extends Data
{
	public function __construct(public Optional|float $count, public Optional|float $privateCount, public Optional|float $archivedTeamCount)
	{
	}
}
