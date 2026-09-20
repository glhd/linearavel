<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ReleasePipelineArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleasePipelineUnarchiveMutationResponse extends LinearResponse
{
	public function resolve(): ReleasePipelineArchivePayload
	{
		return ReleasePipelineArchivePayload::from($this->json('data.releasePipelineUnarchive'));
	}
}
