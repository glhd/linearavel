<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ReleaseStagePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseStageCreateMutationResponse extends LinearResponse
{
	public function resolve(): ReleaseStagePayload
	{
		return ReleaseStagePayload::from($this->json('data.releaseStageCreate'));
	}
}
