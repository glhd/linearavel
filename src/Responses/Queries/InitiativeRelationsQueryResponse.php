<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\InitiativeRelationConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeRelationsQueryResponse extends LinearResponse
{
	public function resolve(): InitiativeRelationConnection
	{
		return InitiativeRelationConnection::from($this->json('data.initiativeRelations'));
	}
}
