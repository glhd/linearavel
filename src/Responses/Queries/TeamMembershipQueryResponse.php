<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\TeamMembership;
use Glhd\Linearavel\Responses\LinearResponse;

class TeamMembershipQueryResponse extends LinearResponse
{
	public function resolve(): TeamMembership
	{
		return TeamMembership::from($this->json('data.teamMembership'));
	}
}
