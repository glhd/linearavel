<?php

namespace Glhd\Linearavel\Requests\Inputs;

class TeamMembershipUpdateInput
{
	public function __construct(public ?bool $owner = null, public ?float $sortOrder = null)
	{
	}
}
