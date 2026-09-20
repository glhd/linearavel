<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\InitiativeLabelConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeLabelsQueryResponse extends LinearResponse
{
	public function resolve(): InitiativeLabelConnection
	{
		return InitiativeLabelConnection::from($this->json('data.initiativeLabels'));
	}
}
