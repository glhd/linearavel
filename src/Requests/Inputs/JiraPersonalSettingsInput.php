<?php

namespace Glhd\Linearavel\Requests\Inputs;

class JiraPersonalSettingsInput
{
	public function __construct(public ?string $siteName = null)
	{
	}
}
