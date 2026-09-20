<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ReleasePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleaseUpdateByPipelineMutationResponse extends LinearResponse
{
	public function resolve(): ReleasePayload
	{
		return ReleasePayload::from($this->json('data.releaseUpdateByPipeline'));
	}
}
