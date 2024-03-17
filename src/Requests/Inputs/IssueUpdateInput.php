<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class IssueUpdateInput
{
	public function __construct(
		/** @var iterable<string>|Collection<int, string> */
		public iterable $subscriberIds,
		/** @var iterable<string>|Collection<int, string> */
		public iterable $labelIds,
		/** @var iterable<string>|Collection<int, string> */
		public iterable $companyIds,
		public ?string $title = null,
		public ?string $description = null,
		public ?string $descriptionData = null,
		public ?string $assigneeId = null,
		public ?string $parentId = null,
		public ?int $priority = null,
		public ?int $estimate = null,
		public ?string $teamId = null,
		public ?string $cycleId = null,
		public ?string $projectId = null,
		public ?string $projectMilestoneId = null,
		public ?string $lastAppliedTemplateId = null,
		public ?string $stateId = null,
		public ?float $boardOrder = null,
		public ?float $sortOrder = null,
		public ?float $subIssueSortOrder = null,
		public ?string $dueDate = null,
		public ?bool $trashed = null,
		public ?CarbonImmutable $slaBreachesAt = null,
		public ?CarbonImmutable $snoozedUntilAt = null,
		public ?string $snoozedById = null
	) {
	}
}
