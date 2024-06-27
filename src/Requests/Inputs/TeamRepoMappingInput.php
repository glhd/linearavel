<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TeamRepoMappingInput */
class TeamRepoMappingInput
{
	public function __construct(public string $linearTeamId, public float $gitHubRepoId, public ?bool $bidirectional = null, public ?bool $default = null)
	{
	}
}
