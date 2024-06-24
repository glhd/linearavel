<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectsResponse extends LinearResponse
{
	public function resolve(): ProjectConnection
	{
		return ProjectConnection::from($this->json('data.projects'));
	}
}
