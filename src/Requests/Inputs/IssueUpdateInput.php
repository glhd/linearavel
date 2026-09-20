<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;
use Glhd\Linearavel\Data\Enums\SLADayCountType;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueUpdateInput */
class IssueUpdateInput
{
	public function __construct(
		public ?string $title = null,
		public ?string $description = null,
		public ?string $descriptionData = null,
		public ?string $assigneeId = null,
		public ?string $delegateId = null,
		public ?string $parentId = null,
		public ?int $priority = null,
		public ?int $estimate = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $subscriberIds = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $labelIds = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $addedLabelIds = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $removedLabelIds = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $releaseIds = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $addedReleaseIds = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $removedReleaseIds = null,
		public ?string $teamId = null,
		public ?string $cycleId = null,
		public ?string $projectId = null,
		public ?string $projectMilestoneId = null,
		public ?string $lastAppliedTemplateId = null,
		public ?string $stateId = null,
		public ?float $boardOrder = null,
		public ?float $sortOrder = null,
		public ?float $prioritySortOrder = null,
		public ?float $subIssueSortOrder = null,
		public ?string $dueDate = null,
		public ?bool $inheritsSharedAccess = null,
		public ?bool $trusted = null,
		public ?bool $trashed = null,
		public ?DateTimeInterface $slaBreachesAt = null,
		public ?DateTimeInterface $slaStartedAt = null,
		public ?DateTimeInterface $snoozedUntilAt = null,
		public ?string $snoozedById = null,
		public ?SLADayCountType $slaType = null,
		public ?bool $autoClosedByParentClosing = null
	) {
	}
}
