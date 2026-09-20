<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/InitiativeSortInput */
class InitiativeSortInput
{
	public function __construct(public ?InitiativeNameSortInput $name = null, public ?InitiativeManualSortInput $manual = null, public ?InitiativeUpdatedAtSortInput $updatedAt = null, public ?InitiativeCreatedAtSortInput $createdAt = null, public ?InitiativeTargetDateSortInput $targetDate = null, public ?InitiativeHealthSortInput $health = null, public ?InitiativeHealthUpdatedAtSortInput $healthUpdatedAt = null, public ?InitiativeOwnerSortInput $owner = null, public ?InitiativePrioritySortInput $priority = null)
	{
	}
}
