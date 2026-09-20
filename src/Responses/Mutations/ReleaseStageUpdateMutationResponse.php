<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ReleaseStagePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseStageUpdateMutationResponse extends LinearResponse
{
	public function resolve(): ReleaseStagePayload
	{
		return ReleaseStagePayload::from($this->json('data.releaseStageUpdate'));
	}
}
