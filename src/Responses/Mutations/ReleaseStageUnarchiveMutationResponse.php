<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ReleaseStageArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseStageUnarchiveMutationResponse extends LinearResponse
{
	public function resolve(): ReleaseStageArchivePayload
	{
		return ReleaseStageArchivePayload::from($this->json('data.releaseStageUnarchive'));
	}
}
