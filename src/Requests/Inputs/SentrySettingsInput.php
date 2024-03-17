<?php

namespace Glhd\Linearavel\Requests\Inputs;

class SentrySettingsInput
{
	public function __construct(public string $organizationSlug)
	{
	}
}
