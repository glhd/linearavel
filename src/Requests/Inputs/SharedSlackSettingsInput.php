<?php

namespace Glhd\Linearavel\Requests\Inputs;

class SharedSlackSettingsInput
{
	public function __construct(public ?string $teamName = null, public ?string $teamId = null)
	{
	}
}
