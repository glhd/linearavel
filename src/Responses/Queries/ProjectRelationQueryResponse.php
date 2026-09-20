<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectRelation;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectRelationQueryResponse extends LinearResponse
{
	public function resolve(): ProjectRelation
	{
		return ProjectRelation::from($this->json('data.projectRelation'));
	}
}
