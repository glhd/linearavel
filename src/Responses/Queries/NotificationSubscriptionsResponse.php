<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\NotificationSubscriptionConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class NotificationSubscriptionsResponse extends LinearResponse
{
	public function resolve(): NotificationSubscriptionConnection
	{
		return NotificationSubscriptionConnection::from($this->json('data.notificationSubscriptions'));
	}
}
