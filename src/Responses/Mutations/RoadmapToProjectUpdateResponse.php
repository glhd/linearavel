<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\RoadmapToProjectPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class RoadmapToProjectUpdateResponse extends LinearResponse
{
	public function resolve(): RoadmapToProjectPayload
	{
		return RoadmapToProjectPayload::from($this->json('data.roadmapToProjectUpdate'));
	}
}
