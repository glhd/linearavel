<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\InitiativeUpdate;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeUpdateQueryResponse extends LinearResponse
{
	public function resolve(): InitiativeUpdate
	{
		return InitiativeUpdate::from($this->json('data.initiativeUpdate'));
	}
}
