<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class TriageResponsibilityManualSelectionInput
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public iterable $userIds,
		public ?int $assignmentIndex = null
	) {
	}
}
