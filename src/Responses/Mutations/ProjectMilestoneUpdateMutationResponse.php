<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectMilestonePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectMilestoneUpdateMutationResponse extends LinearResponse
{
	public function resolve(): ProjectMilestonePayload
	{
		return ProjectMilestonePayload::from($this->json('data.projectMilestoneUpdate'));
	}
}
