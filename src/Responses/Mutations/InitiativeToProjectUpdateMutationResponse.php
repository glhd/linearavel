<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\InitiativeToProjectPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeToProjectUpdateMutationResponse extends LinearResponse
{
	public function resolve(): InitiativeToProjectPayload
	{
		return InitiativeToProjectPayload::from($this->json('data.initiativeToProjectUpdate'));
	}
}
