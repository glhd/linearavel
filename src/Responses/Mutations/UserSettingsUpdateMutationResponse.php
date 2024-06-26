<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\UserSettingsPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class UserSettingsUpdateMutationResponse extends LinearResponse
{
	public function resolve(): UserSettingsPayload
	{
		return UserSettingsPayload::from($this->json('data.userSettingsUpdate'));
	}
}
