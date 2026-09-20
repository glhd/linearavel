<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectStatusArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectStatusUnarchiveMutationResponse extends LinearResponse
{
	public function resolve(): ProjectStatusArchivePayload
	{
		return ProjectStatusArchivePayload::from($this->json('data.projectStatusUnarchive'));
	}
}
