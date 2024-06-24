<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\InitiativeToProjectPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeToProjectUpdateResponse extends LinearResponse
{
	public function resolve(): InitiativeToProjectPayload
	{
		return InitiativeToProjectPayload::from($this->json('data.initiativeToProjectUpdate'));
	}
}
