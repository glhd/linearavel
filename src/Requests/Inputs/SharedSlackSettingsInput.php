<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SharedSlackSettingsInput */
class SharedSlackSettingsInput
{
	public function __construct(public ?string $teamName = null, public ?string $teamId = null)
	{
	}
}
