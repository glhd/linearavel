<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationThemeSettingsInput */
class OrganizationThemeSettingsInput
{
	public function __construct(public ?string $lightTheme = null, public ?string $darkTheme = null)
	{
	}
}
