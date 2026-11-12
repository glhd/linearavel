<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectMilestoneMovePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectMilestoneMoveMutationResponse extends LinearResponse
{
	public function resolve(): ProjectMilestoneMovePayload
	{
		return ProjectMilestoneMovePayload::from($this->json('data.projectMilestoneMove'));
	}
}
