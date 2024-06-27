<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/SentrySettingsInput */
class SentrySettingsInput
{
	public function __construct(public string $organizationSlug)
	{
	}
}
