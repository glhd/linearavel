<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectUpdateInteraction;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectUpdateInteractionQueryResponse extends LinearResponse
{
	public function resolve(): ProjectUpdateInteraction
	{
		return ProjectUpdateInteraction::from($this->json('data.projectUpdateInteraction'));
	}
}
