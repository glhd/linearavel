<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\NotificationConnection;
use Glhd\Linearavel\Responses\LinearResponse;

class NotificationsResponse extends LinearResponse
{
	public function resolve(): NotificationConnection
	{
		return NotificationConnection::from($this->json('data.notifications'));
	}
}
