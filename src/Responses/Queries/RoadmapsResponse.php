<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\RoadmapConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class RoadmapsResponse extends LinearResponse
{
	public function resolve(): RoadmapConnection
	{
		return RoadmapConnection::from($this->json('data.roadmaps'));
	}
}
