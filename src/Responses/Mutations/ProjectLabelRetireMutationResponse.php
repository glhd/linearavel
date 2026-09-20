<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectLabelPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectLabelRetireMutationResponse extends LinearResponse
{
	public function resolve(): ProjectLabelPayload
	{
		return ProjectLabelPayload::from($this->json('data.projectLabelRetire'));
	}
}
