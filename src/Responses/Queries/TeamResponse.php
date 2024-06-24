<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Team;
use Glhd\Linearavel\Responses\LinearResponse;

class TeamResponse extends LinearResponse
{
	public function resolve(): Team
	{
		return Team::from($this->json('data.team'));
	}
}
