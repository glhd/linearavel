<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Responses\LinearResponse;

class NotificationsUnreadCountQueryResponse extends LinearResponse
{
	public function resolve(): int
	{
		return $this->json('data.notificationsUnreadCount');
	}
}
