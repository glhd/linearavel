<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\InitiativeLeadTeamChangeImpact;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeLeadTeamChangeImpactQueryResponse extends LinearResponse
{
	public function resolve(): InitiativeLeadTeamChangeImpact
	{
		return InitiativeLeadTeamChangeImpact::from($this->json('data.initiativeLeadTeamChangeImpact'));
	}
}
