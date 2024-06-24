<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectMilestone;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectMilestoneResponse extends LinearResponse
{
	public function resolve(): ProjectMilestone
	{
		return ProjectMilestone::from($this->json('data.projectMilestone'));
	}
}
