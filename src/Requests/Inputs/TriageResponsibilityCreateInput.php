<?php

namespace Glhd\Linearavel\Requests\Inputs;

class TriageResponsibilityCreateInput
{
	public function __construct(
		public string $teamId,
		public string $action,
		public ?string $id = null,
		public ?TriageResponsibilityManualSelectionInput $manualSelection = null,
		public ?string $timeScheduleId = null
	) {
	}
}
