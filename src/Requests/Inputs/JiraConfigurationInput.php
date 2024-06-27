<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraConfigurationInput */
class JiraConfigurationInput
{
	public function __construct(public string $accessToken, public string $email, public string $hostname, public ?string $project = null)
	{
	}
}
