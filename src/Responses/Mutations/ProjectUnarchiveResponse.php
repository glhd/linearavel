<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectUnarchiveResponse extends LinearResponse
{
	public function resolve(): ProjectArchivePayload
	{
		return ProjectArchivePayload::from($this->json('data.projectUnarchive'));
	}
}
