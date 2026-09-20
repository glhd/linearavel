<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\InitiativeRelation;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeRelationQueryResponse extends LinearResponse
{
	public function resolve(): InitiativeRelation
	{
		return InitiativeRelation::from($this->json('data.initiativeRelation'));
	}
}
