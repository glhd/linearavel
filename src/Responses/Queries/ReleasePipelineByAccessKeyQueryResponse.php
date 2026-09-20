<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\AccessKeyReleasePipeline;
use Glhd\Linearavel\Responses\LinearResponse;

class ReleasePipelineByAccessKeyQueryResponse extends LinearResponse
{
	public function resolve(): AccessKeyReleasePipeline
	{
		return AccessKeyReleasePipeline::from($this->json('data.releasePipelineByAccessKey'));
	}
}
