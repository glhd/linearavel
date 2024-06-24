<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\NotificationSubscriptionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class NotificationSubscriptionCreateResponse extends LinearResponse
{
	public function resolve(): NotificationSubscriptionPayload
	{
		return NotificationSubscriptionPayload::from($this->json('data.notificationSubscriptionCreate'));
	}
}
