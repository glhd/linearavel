<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectUpdateConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectUpdatesQueryResponse extends LinearResponse
{
	public function resolve(): ProjectUpdateConnection
	{
		return ProjectUpdateConnection::from($this->json('data.projectUpdates'));
	}
}
