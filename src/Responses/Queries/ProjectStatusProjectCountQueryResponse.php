<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectStatusCountPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectStatusProjectCountQueryResponse extends LinearResponse
{
	public function resolve(): ProjectStatusCountPayload
	{
		return ProjectStatusCountPayload::from($this->json('data.projectStatusProjectCount'));
	}
}
