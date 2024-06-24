<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Roadmap;
use Glhd\Linearavel\Responses\LinearResponse;

class RoadmapResponse extends LinearResponse
{
	public function resolve(): Roadmap
	{
		return Roadmap::from($this->json('data.roadmap'));
	}
}
