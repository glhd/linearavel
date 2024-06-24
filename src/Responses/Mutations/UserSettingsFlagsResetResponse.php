<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\UserSettingsFlagsResetPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class UserSettingsFlagsResetResponse extends LinearResponse
{
	public function resolve(): UserSettingsFlagsResetPayload
	{
		return UserSettingsFlagsResetPayload::from($this->json('data.userSettingsFlagsReset'));
	}
}
