<?php

namespace Glhd\Linearavel\Responses\Queries;

use Glhd\Linearavel\Data\UserSettings;
use Glhd\Linearavel\Responses\LinearResponse;

class UserSettingsResponse extends LinearResponse
{
	public function resolve(): UserSettings
	{
		return UserSettings::from($this->json('data.userSettings'));
	}
}
