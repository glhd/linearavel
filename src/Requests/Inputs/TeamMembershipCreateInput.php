<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TeamMembershipCreateInput */
class TeamMembershipCreateInput
{
	public function __construct(public string $userId, public string $teamId, public ?string $id = null, public ?bool $owner = null, public ?float $sortOrder = null)
	{
	}
}
