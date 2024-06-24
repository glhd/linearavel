<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\RoadmapToProject;
use Glhd\Linearavel\Responses\LinearResponse;

class RoadmapToProjectResponse extends LinearResponse
{
	public function resolve(): RoadmapToProject
	{
		return RoadmapToProject::from($this->json('data.roadmapToProject'));
	}
}
