<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueUpdateInput */
class IssueUpdateInput
{
	public function __construct(
		public ?string $title = null,
		public ?string $description = null,
		public ?string $descriptionData = null,
		public ?string $assigneeId = null,
		public ?string $parentId = null,
		public ?int $priority = null,
		public ?int $estimate = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $subscriberIds = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $labelIds = null,
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
		public ?DateTimeInterface $slaBreachesAt = null,
		public ?DateTimeInterface $snoozedUntilAt = null,
		public ?string $snoozedById = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $companyIds = null
	) {
	}
}
