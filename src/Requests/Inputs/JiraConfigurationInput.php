<?php

namespace Glhd\Linearavel\Requests\Inputs;

class JiraConfigurationInput
{
	public function __construct(public string $accessToken, public string $email, public string $hostname, public ?string $project = null)
	{
	}
}
