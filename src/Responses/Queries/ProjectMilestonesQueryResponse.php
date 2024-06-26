<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectMilestoneConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectMilestonesQueryResponse extends LinearResponse
{
	public function resolve(): ProjectMilestoneConnection
	{
		return ProjectMilestoneConnection::from($this->json('data.projectMilestones'));
	}
}
