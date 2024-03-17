<?php

namespace Glhd\Linearavel\Requests\Inputs;

class TeamRepoMappingInput
{
	public function __construct(public string $linearTeamId, public float $gitHubRepoId, public ?bool $bidirectional = null, public ?bool $default = null)
	{
	}
}
