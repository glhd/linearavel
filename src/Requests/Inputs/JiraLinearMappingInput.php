<?php

namespace Glhd\Linearavel\Requests\Inputs;

class JiraLinearMappingInput
{
	function __construct(public string $jiraProjectId, public string $linearTeamId, public ?bool $bidirectional = null, public ?bool $default = null)
	{
	}
}
