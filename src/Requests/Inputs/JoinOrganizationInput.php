<?php

namespace Glhd\Linearavel\Requests\Inputs;

class JoinOrganizationInput
{
	function __construct(public string $organizationId, public ?string $inviteLink = null)
	{
	}
}
