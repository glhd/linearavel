<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\InitiativeUpdatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeUpdateCreateMutationResponse extends LinearResponse
{
	public function resolve(): InitiativeUpdatePayload
	{
		return InitiativeUpdatePayload::from($this->json('data.initiativeUpdateCreate'));
	}
}
