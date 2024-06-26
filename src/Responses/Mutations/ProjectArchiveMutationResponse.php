<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ProjectArchiveMutationResponse extends LinearResponse
{
	public function resolve(): ProjectArchivePayload
	{
		return ProjectArchivePayload::from($this->json('data.projectArchive'));
	}
}
