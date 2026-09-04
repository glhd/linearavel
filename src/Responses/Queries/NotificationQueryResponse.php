<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\Contracts\Notification;
use Glhd\Linearavel\Responses\LinearResponse;

class NotificationQueryResponse extends LinearResponse
{
	public function resolve(): Notification
	{
		return Notification::from($this->json('data.notification'));
	}
}
