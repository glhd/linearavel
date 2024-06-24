<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\NotificationArchivePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class NotificationArchiveResponse extends LinearResponse
{
	public function resolve(): NotificationArchivePayload
	{
		return NotificationArchivePayload::from($this->json('data.notificationArchive'));
	}
}
