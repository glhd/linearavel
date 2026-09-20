<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeRelationCreateInput */
class InitiativeRelationCreateInput
{
	public function __construct(public string $initiativeId, public string $relatedInitiativeId, public ?string $id = null, public ?float $sortOrder = null)
	{
	}
}
