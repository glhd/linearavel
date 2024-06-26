<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\NotificationBatchActionPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class NotificationUnsnoozeAllMutationResponse extends LinearResponse
{
	public function resolve(): NotificationBatchActionPayload
	{
		return NotificationBatchActionPayload::from($this->json('data.notificationUnsnoozeAll'));
	}
}
