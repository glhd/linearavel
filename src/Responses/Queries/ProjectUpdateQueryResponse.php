<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectUpdate;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectUpdateQueryResponse extends LinearResponse
{
	public function resolve(): ProjectUpdate
	{
		return ProjectUpdate::from($this->json('data.projectUpdate'));
	}
}
