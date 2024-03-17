<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class JiraLinearMapping extends Data
{
	public function __construct(public Optional|string $jiraProjectId, public Optional|string $linearTeamId, public Optional|bool|null $bidirectional = null, public Optional|bool|null $default = null)
	{
	}
}
