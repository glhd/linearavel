<?php

namespace Glhd\Linearavel\Requests\Inputs;

class GitHubPersonalSettingsInput
{
	public function __construct(public string $login)
	{
	}
}
