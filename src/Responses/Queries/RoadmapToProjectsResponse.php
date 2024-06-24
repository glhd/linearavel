<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\RoadmapToProjectConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class RoadmapToProjectsResponse extends LinearResponse
{
	public function resolve(): RoadmapToProjectConnection
	{
		return RoadmapToProjectConnection::from($this->json('data.roadmapToProjects'));
	}
}
