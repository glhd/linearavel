<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/GitHubPersonalSettingsInput */
class GitHubPersonalSettingsInput
{
	public function __construct(public string $login)
	{
	}
}
