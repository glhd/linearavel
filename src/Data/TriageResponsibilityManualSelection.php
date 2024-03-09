<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TriageResponsibilityManualSelection extends Data
{
	function __construct(
		/** @var Collection<int, string> */
		public Collection $userIds,
		public Optional|int|null $assignmentIndex
	) {
	}
}