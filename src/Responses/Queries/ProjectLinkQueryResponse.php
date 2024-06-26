<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectLink;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectLinkQueryResponse extends LinearResponse
{
	public function resolve(): ProjectLink
	{
		return ProjectLink::from($this->json('data.projectLink'));
	}
}
