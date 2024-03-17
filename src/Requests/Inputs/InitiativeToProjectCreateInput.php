<?php

namespace Glhd\Linearavel\Requests\Inputs;

class InitiativeToProjectCreateInput
{
	public function __construct(public string $projectId, public string $initiativeId, public ?string $id = null, public ?float $sortOrder = null)
	{
	}
}
