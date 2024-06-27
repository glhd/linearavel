<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotionSettingsInput */
class NotionSettingsInput
{
	public function __construct(public string $workspaceId, public string $workspaceName)
	{
	}
}
