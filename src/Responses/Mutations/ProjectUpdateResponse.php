<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectUpdateResponse extends LinearResponse
{
	public function resolve(): ProjectPayload
	{
		return ProjectPayload::from($this->json('data.projectUpdate'));
	}
}
