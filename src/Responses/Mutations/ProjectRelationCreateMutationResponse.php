<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectRelationPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectRelationCreateMutationResponse extends LinearResponse
{
	public function resolve(): ProjectRelationPayload
	{
		return ProjectRelationPayload::from($this->json('data.projectRelationCreate'));
	}
}
