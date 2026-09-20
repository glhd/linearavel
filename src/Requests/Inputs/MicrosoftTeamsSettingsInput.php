<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/MicrosoftTeamsSettingsInput */
class MicrosoftTeamsSettingsInput
{
	public function __construct(public ?string $tenantName = null, public ?bool $enableCodeIntelligence = null)
	{
	}
}
