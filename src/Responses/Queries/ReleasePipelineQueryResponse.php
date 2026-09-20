<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ReleasePipeline;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleasePipelineQueryResponse extends LinearResponse
{
	public function resolve(): ReleasePipeline
	{
		return ReleasePipeline::from($this->json('data.releasePipeline'));
	}
}
