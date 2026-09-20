<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectStatusPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectStatusUpdateMutationResponse extends LinearResponse
{
	public function resolve(): ProjectStatusPayload
	{
		return ProjectStatusPayload::from($this->json('data.projectStatusUpdate'));
	}
}
