<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ReleasePipelinePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleasePipelineCreateMutationResponse extends LinearResponse
{
	public function resolve(): ReleasePipelinePayload
	{
		return ReleasePipelinePayload::from($this->json('data.releasePipelineCreate'));
	}
}
