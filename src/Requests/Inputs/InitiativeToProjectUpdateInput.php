<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeToProjectUpdateInput */
class InitiativeToProjectUpdateInput
{
	public function __construct(public ?float $sortOrder = null)
	{
	}
}
