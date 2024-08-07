<?php

namespace Glhd\Linearavel\Responses\Mutations;

use Glhd\Linearavel\Data\UserSettingsFlagPayload;
use Glhd\Linearavel\Responses\LinearResponse;

class UserSettingsFlagIncrementMutationResponse extends LinearResponse
{
	public function resolve(): UserSettingsFlagPayload
	{
		return UserSettingsFlagPayload::from($this->json('data.userSettingsFlagIncrement'));
	}
}
