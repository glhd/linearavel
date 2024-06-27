<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TriageResponsibilityUpdateInput */
class TriageResponsibilityUpdateInput
{
	public function __construct(public ?string $action = null, public ?TriageResponsibilityManualSelectionInput $manualSelection = null, public ?string $timeScheduleId = null)
	{
	}
}
