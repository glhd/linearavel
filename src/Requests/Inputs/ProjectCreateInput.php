<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\DateResolutionType;
use Illuminate\Support\Collection;

class ProjectCreateInput
{
	public function __construct(
		public string $name,
		/** @var iterable<string>|Collection<int, string> */
		public iterable $teamIds,
		public ?string $id = null,
		public ?string $icon = null,
		public ?string $color = null,
		public ?string $state = null,
		public ?string $statusId = null,
		public ?string $description = null,
		public ?string $convertedFromIssueId = null,
		public ?string $lastAppliedTemplateId = null,
		public ?string $leadId = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $memberIds = null,
		public ?string $startDate = null,
		public ?DateResolutionType $startDateResolution = null,
		public ?string $targetDate = null,
		public ?DateResolutionType $targetDateResolution = null,
		public ?float $sortOrder = null
	) {
	}
}
