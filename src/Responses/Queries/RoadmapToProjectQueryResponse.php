<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\RoadmapToProject;
use Glhd\Linearavel\Responses\LinearResponse;

class RoadmapToProjectQueryResponse extends LinearResponse
{
	public function resolve(): RoadmapToProject
	{
		return RoadmapToProject::from($this->json('data.roadmapToProject'));
	}
}
