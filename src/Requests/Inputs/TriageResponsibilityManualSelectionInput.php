<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TriageResponsibilityManualSelectionInput
{
	public function __construct(
		/** @var Collection<int, string> */
		public Collection $userIds,
		public ?int $assignmentIndex = null
	) {
	}
}
