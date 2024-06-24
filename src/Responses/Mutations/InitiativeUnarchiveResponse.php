<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\InitiativeArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeUnarchiveResponse extends LinearResponse
{
	public function resolve(): InitiativeArchivePayload
	{
		return InitiativeArchivePayload::from($this->json('data.initiativeUnarchive'));
	}
}
