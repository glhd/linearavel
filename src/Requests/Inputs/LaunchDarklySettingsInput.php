<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/LaunchDarklySettingsInput */
class LaunchDarklySettingsInput
{
	public function __construct(public string $projectKey, public string $environment)
	{
	}
}
