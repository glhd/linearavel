<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/MicrosoftTeamsPostSettingsInput */
class MicrosoftTeamsPostSettingsInput
{
	public function __construct(public string $teamId, public string $teamName, public string $channelId, public string $channelName, public string $membershipType, public string $tenantId)
	{
	}
}
