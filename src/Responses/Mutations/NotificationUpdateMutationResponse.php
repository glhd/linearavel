<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\NotificationPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class NotificationUpdateMutationResponse extends LinearResponse
{
	public function resolve(): NotificationPayload
	{
		return NotificationPayload::from($this->json('data.notificationUpdate'));
	}
}
