<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectRelationConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectRelationsQueryResponse extends LinearResponse
{
	public function resolve(): ProjectRelationConnection
	{
		return ProjectRelationConnection::from($this->json('data.projectRelations'));
	}
}
