<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectStatusConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectStatusesQueryResponse extends LinearResponse
{
	public function resolve(): ProjectStatusConnection
	{
		return ProjectStatusConnection::from($this->json('data.projectStatuses'));
	}
}
