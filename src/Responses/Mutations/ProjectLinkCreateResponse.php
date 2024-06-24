<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectLinkPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectLinkCreateResponse extends LinearResponse
{
	public function resolve(): ProjectLinkPayload
	{
		return ProjectLinkPayload::from($this->json('data.projectLinkCreate'));
	}
}
