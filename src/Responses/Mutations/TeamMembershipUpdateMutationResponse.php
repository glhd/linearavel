<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\TeamMembershipPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class TeamMembershipUpdateMutationResponse extends LinearResponse
{
	public function resolve(): TeamMembershipPayload
	{
		return TeamMembershipPayload::from($this->json('data.teamMembershipUpdate'));
	}
}
