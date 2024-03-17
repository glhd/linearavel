<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TeamMembershipPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|TeamMembership|null $teamMembership = null, public Optional|bool $success)
	{
	}
}
