<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectStatus;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectStatusQueryResponse extends LinearResponse
{
	public function resolve(): ProjectStatus
	{
		return ProjectStatus::from($this->json('data.projectStatus'));
	}
}
