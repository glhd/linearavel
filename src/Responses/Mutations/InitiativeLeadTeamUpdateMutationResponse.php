<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\InitiativeLeadTeamUpdatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeLeadTeamUpdateMutationResponse extends LinearResponse
{
	public function resolve(): InitiativeLeadTeamUpdatePayload
	{
		return InitiativeLeadTeamUpdatePayload::from($this->json('data.initiativeLeadTeamUpdate'));
	}
}
