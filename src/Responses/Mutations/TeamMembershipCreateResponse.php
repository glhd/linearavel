<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\TeamMembershipPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class TeamMembershipCreateResponse extends LinearResponse
{
	public function resolve(): TeamMembershipPayload
	{
		return TeamMembershipPayload::from($this->json('data.teamMembershipCreate'));
	}
}
