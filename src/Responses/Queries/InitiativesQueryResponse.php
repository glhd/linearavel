<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\InitiativeConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativesQueryResponse extends LinearResponse
{
	public function resolve(): InitiativeConnection
	{
		return InitiativeConnection::from($this->json('data.initiatives'));
	}
}
