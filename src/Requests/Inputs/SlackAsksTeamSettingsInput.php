<?php

namespace Glhd\Linearavel\Requests\Inputs;

class SlackAsksTeamSettingsInput
{
	public function __construct(public string $id, public bool $hasDefaultAsk)
	{
	}
}
