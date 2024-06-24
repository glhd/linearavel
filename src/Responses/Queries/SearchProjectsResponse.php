<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectSearchPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class SearchProjectsResponse extends LinearResponse
{
	public function resolve(): ProjectSearchPayload
	{
		return ProjectSearchPayload::from($this->json('data.searchProjects'));
	}
}
