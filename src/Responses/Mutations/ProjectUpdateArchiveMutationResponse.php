<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectUpdateArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectUpdateArchiveMutationResponse extends LinearResponse
{
	public function resolve(): ProjectUpdateArchivePayload
	{
		return ProjectUpdateArchivePayload::from($this->json('data.projectUpdateArchive'));
	}
}
