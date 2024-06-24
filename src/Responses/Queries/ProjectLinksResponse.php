<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectLinkConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectLinksResponse extends LinearResponse
{
	public function resolve(): ProjectLinkConnection
	{
		return ProjectLinkConnection::from($this->json('data.projectLinks'));
	}
}
