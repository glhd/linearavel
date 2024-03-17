<?php

namespace Glhd\Linearavel\Requests\Inputs;

class NotionSettingsInput
{
	function __construct(public string $workspaceId, public string $workspaceName)
	{
	}
}
