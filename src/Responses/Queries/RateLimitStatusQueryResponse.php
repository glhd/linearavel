<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\RateLimitPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class RateLimitStatusQueryResponse extends LinearResponse
{
	public function resolve(): RateLimitPayload
	{
		return RateLimitPayload::from($this->json('data.rateLimitStatus'));
	}
}
