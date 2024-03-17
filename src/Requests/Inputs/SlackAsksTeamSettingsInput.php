<?php

namespace Glhd\Linearavel\Requests\Inputs;

class SlackAsksTeamSettingsInput
{
	function __construct(public string $id, public bool $hasDefaultAsk)
	{
	}
}
