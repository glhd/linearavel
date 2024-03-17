<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ViewPreferencesUpdateInput
{
	function __construct(public ?string $preferences = null, public ?string $insights = null)
	{
	}
}
