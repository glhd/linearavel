<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\InboxNotificationUpdatePayload;
use Glhd\Linearavel\Responses\LinearResponse;

class InboxNotificationUpdateMutationResponse extends LinearResponse
{
	public function resolve(): InboxNotificationUpdatePayload
	{
		return InboxNotificationUpdatePayload::from($this->json('data.inboxNotificationUpdate'));
	}
}
