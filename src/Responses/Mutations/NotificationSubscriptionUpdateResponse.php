<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\NotificationSubscriptionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class NotificationSubscriptionUpdateResponse extends LinearResponse
{
	public function resolve(): NotificationSubscriptionPayload
	{
		return NotificationSubscriptionPayload::from($this->json('data.notificationSubscriptionUpdate'));
	}
}
