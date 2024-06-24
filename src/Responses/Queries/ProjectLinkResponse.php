<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectLink;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectLinkResponse extends LinearResponse
{
	public function resolve(): ProjectLink
	{
		return ProjectLink::from($this->json('data.projectLink'));
	}
}
