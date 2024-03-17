<?php

namespace Glhd\Linearavel\Requests\Inputs;

class JiraPersonalSettingsInput
{
	function __construct(public ?string $siteName = null)
	{
	}
}
