<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\InitiativePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeUpdateMutationResponse extends LinearResponse
{
	public function resolve(): InitiativePayload
	{
		return InitiativePayload::from($this->json('data.initiativeUpdate'));
	}
}
