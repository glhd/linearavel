<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JoinOrganizationInput */
class JoinOrganizationInput
{
	public function __construct(public string $organizationId, public ?string $inviteLink = null)
	{
	}
}
