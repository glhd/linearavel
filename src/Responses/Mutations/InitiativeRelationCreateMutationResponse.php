<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\InitiativeRelationPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeRelationCreateMutationResponse extends LinearResponse
{
	public function resolve(): InitiativeRelationPayload
	{
		return InitiativeRelationPayload::from($this->json('data.initiativeRelationCreate'));
	}
}
