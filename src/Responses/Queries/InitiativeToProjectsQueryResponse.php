<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\InitiativeToProjectConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeToProjectsQueryResponse extends LinearResponse
{
	public function resolve(): InitiativeToProjectConnection
	{
		return InitiativeToProjectConnection::from($this->json('data.initiativeToProjects'));
	}
}
