<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\InitiativeUpdateConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeUpdatesQueryResponse extends LinearResponse
{
	public function resolve(): InitiativeUpdateConnection
	{
		return InitiativeUpdateConnection::from($this->json('data.initiativeUpdates'));
	}
}
