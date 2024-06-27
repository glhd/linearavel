<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TeamMembershipUpdateInput */
class TeamMembershipUpdateInput
{
	public function __construct(public ?bool $owner = null, public ?float $sortOrder = null)
	{
	}
}
