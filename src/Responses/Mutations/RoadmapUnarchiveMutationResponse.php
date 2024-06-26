<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\RoadmapArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class RoadmapUnarchiveMutationResponse extends LinearResponse
{
	public function resolve(): RoadmapArchivePayload
	{
		return RoadmapArchivePayload::from($this->json('data.roadmapUnarchive'));
	}
}
