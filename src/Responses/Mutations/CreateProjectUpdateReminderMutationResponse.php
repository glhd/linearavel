<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\ProjectUpdateReminderPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class CreateProjectUpdateReminderMutationResponse extends LinearResponse
{
	public function resolve(): ProjectUpdateReminderPayload
	{
		return ProjectUpdateReminderPayload::from($this->json('data.createProjectUpdateReminder'));
	}
}
