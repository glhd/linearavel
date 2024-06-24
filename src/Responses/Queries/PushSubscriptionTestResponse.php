<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\PushSubscriptionTestPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class PushSubscriptionTestResponse extends LinearResponse
{
	public function resolve(): PushSubscriptionTestPayload
	{
		return PushSubscriptionTestPayload::from($this->json('data.pushSubscriptionTest'));
	}
}
