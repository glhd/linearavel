<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraPersonalSettingsInput */
class JiraPersonalSettingsInput
{
	public function __construct(public ?string $siteName = null)
	{
	}
}
