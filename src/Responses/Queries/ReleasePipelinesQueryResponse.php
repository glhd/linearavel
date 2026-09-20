<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\ReleasePipelineConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleasePipelinesQueryResponse extends LinearResponse
{
	public function resolve(): ReleasePipelineConnection
	{
		return ReleasePipelineConnection::from($this->json('data.releasePipelines'));
	}
}
