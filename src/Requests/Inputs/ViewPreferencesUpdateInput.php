<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ViewPreferencesUpdateInput
{
	public function __construct(public ?string $preferences = null, public ?string $insights = null)
	{
	}
}
