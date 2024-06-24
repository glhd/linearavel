<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectUpdateWithInteractionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectUpdateMarkAsReadResponse extends LinearResponse
{
	public function resolve(): ProjectUpdateWithInteractionPayload
	{
		return ProjectUpdateWithInteractionPayload::from($this->json('data.projectUpdateMarkAsRead'));
	}
}
