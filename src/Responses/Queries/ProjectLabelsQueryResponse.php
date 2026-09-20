<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ProjectLabelConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectLabelsQueryResponse extends LinearResponse
{
	public function resolve(): ProjectLabelConnection
	{
		return ProjectLabelConnection::from($this->json('data.projectLabels'));
	}
}
