<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeToProjectCreateInput */
class InitiativeToProjectCreateInput
{
	public function __construct(public string $projectId, public string $initiativeId, public ?string $id = null, public ?float $sortOrder = null)
	{
	}
}
