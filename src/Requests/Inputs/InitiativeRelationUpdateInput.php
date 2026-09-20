<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeRelationUpdateInput */
class InitiativeRelationUpdateInput
{
	public function __construct(public ?float $sortOrder = null)
	{
	}
}
