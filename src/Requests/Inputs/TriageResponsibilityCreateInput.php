<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TriageResponsibilityCreateInput */
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
