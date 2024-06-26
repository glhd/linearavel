<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\CustomViewHasSubscribersPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CustomViewHasSubscribersQueryResponse extends LinearResponse
{
	public function resolve(): CustomViewHasSubscribersPayload
	{
		return CustomViewHasSubscribersPayload::from($this->json('data.customViewHasSubscribers'));
	}
}
