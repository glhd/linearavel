<?php

namespace Glhd\Linearavel\Requests\Inputs;

class TeamMembershipCreateInput
{
	public function __construct(public string $userId, public string $teamId, public ?string $id = null, public ?bool $owner = null, public ?float $sortOrder = null)
	{
	}
}
