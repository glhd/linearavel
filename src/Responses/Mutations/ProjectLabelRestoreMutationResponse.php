<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectLabelPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectLabelRestoreMutationResponse extends LinearResponse
{
	public function resolve(): ProjectLabelPayload
	{
		return ProjectLabelPayload::from($this->json('data.projectLabelRestore'));
	}
}
