<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectUpdateInteractionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectUpdateInteractionCreateResponse extends LinearResponse
{
	public function resolve(): ProjectUpdateInteractionPayload
	{
		return ProjectUpdateInteractionPayload::from($this->json('data.projectUpdateInteractionCreate'));
	}
}
