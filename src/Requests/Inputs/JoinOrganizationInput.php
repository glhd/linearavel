<?php

namespace Glhd\Linearavel\Requests\Inputs;

class JoinOrganizationInput
{
	public function __construct(public string $organizationId, public ?string $inviteLink = null)
	{
	}
}
