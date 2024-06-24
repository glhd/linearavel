<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\TeamConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class TeamsResponse extends LinearResponse
{
	public function resolve(): TeamConnection
	{
		return TeamConnection::from($this->json('data.teams'));
	}
}
