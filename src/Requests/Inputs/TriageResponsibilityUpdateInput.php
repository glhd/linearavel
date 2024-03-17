<?php

namespace Glhd\Linearavel\Requests\Inputs;

class TriageResponsibilityUpdateInput
{
	function __construct(public ?string $action = null, public ?TriageResponsibilityManualSelectionInput $manualSelection = null, public ?string $timeScheduleId = null)
	{
	}
}
