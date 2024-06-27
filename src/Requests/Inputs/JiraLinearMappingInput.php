<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraLinearMappingInput */
class JiraLinearMappingInput
{
	public function __construct(public string $jiraProjectId, public string $linearTeamId, public ?bool $bidirectional = null, public ?bool $default = null)
	{
	}
}
