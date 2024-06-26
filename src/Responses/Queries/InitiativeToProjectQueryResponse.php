<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\InitiativeToProject;
use Glhd\Linearavel\Responses\LinearResponse;

class InitiativeToProjectQueryResponse extends LinearResponse
{
	public function resolve(): InitiativeToProject
	{
		return InitiativeToProject::from($this->json('data.initiativeToProject'));
	}
}
