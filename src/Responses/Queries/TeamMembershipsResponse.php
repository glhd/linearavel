<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\TeamMembershipConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class TeamMembershipsResponse extends LinearResponse
{
	public function resolve(): TeamMembershipConnection
	{
		return TeamMembershipConnection::from($this->json('data.teamMemberships'));
	}
}
