<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\InitiativeUpdateReminderPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CreateInitiativeUpdateReminderMutationResponse extends LinearResponse
{
	public function resolve(): InitiativeUpdateReminderPayload
	{
		return InitiativeUpdateReminderPayload::from($this->json('data.createInitiativeUpdateReminder'));
	}
}
