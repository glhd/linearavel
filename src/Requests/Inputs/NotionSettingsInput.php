<?php

namespace Glhd\Linearavel\Requests\Inputs;

class NotionSettingsInput
{
	public function __construct(public string $workspaceId, public string $workspaceName)
	{
	}
}
