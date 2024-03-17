<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TeamRepoMapping extends Data
{
	function __construct(public Optional|string $linearTeamId, public Optional|float $gitHubRepoId, public Optional|bool|null $bidirectional = null, public Optional|bool|null $default = null)
	{
	}
}
