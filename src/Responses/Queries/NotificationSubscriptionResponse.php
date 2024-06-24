<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Glhd\Linearavel\Responses\LinearResponse;

class NotificationSubscriptionResponse extends LinearResponse
{
	public function resolve(): NotificationSubscription
	{
		return NotificationSubscription::from($this->json('data.notificationSubscription'));
	}
}
