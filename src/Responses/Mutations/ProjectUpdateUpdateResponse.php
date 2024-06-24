<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectUpdatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectUpdateUpdateResponse extends LinearResponse
{
	public function resolve(): ProjectUpdatePayload
	{
		return ProjectUpdatePayload::from($this->json('data.projectUpdateUpdate'));
	}
}
