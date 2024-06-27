<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/JiraLinearMapping */
class JiraLinearMapping extends Data
{
	public function __construct(public Optional|string $jiraProjectId, public Optional|string $linearTeamId, public Optional|bool|null $bidirectional, public Optional|bool|null $default)
	{
	}
}
