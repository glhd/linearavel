<?php

namespace Glhd\Linearavel\Requests\Inputs;

class TriageResponsibilityUpdateInput
{
	public function __construct(public ?string $action = null, public ?TriageResponsibilityManualSelectionInput $manualSelection = null, public ?string $timeScheduleId = null)
	{
	}
}
