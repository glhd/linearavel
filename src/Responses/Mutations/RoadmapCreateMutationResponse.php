<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\RoadmapPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class RoadmapCreateMutationResponse extends LinearResponse
{
	public function resolve(): RoadmapPayload
	{
		return RoadmapPayload::from($this->json('data.roadmapCreate'));
	}
}
