<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Project;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectQueryResponse extends LinearResponse
{
	public function resolve(): Project
	{
		return Project::from($this->json('data.project'));
	}
}
