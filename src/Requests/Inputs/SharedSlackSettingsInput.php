<?php

namespace Glhd\Linearavel\Requests\Inputs;

class SharedSlackSettingsInput
{
	function __construct(public ?string $teamName = null, public ?string $teamId = null)
	{
	}
}
