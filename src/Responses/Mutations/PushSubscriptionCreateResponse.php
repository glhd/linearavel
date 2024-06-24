<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\PushSubscriptionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class PushSubscriptionCreateResponse extends LinearResponse
{
	public function resolve(): PushSubscriptionPayload
	{
		return PushSubscriptionPayload::from($this->json('data.pushSubscriptionCreate'));
	}
}
