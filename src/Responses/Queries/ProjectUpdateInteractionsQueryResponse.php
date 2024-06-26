<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectUpdateInteractionConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectUpdateInteractionsQueryResponse extends LinearResponse
{
	public function resolve(): ProjectUpdateInteractionConnection
	{
		return ProjectUpdateInteractionConnection::from($this->json('data.projectUpdateInteractions'));
	}
}
