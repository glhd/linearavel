<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;

class IssueCreateInput
{
	function __construct(
		/** @var Collection<int, string> */
		public Collection $subscriberIds,
		/** @var Collection<int, string> */
		public Collection $labelIds,
		public string $teamId,
		public ?string $id = null,
		public ?string $title = null,
		public ?string $description = null,
		public ?string $descriptionData = null,
		public ?string $assigneeId = null,
		public ?string $parentId = null,
		public ?int $priority = null,
		public ?int $estimate = null,
		public ?string $cycleId = null,
		public ?string $projectId = null,
		public ?string $projectMilestoneId = null,
		public ?string $lastAppliedTemplateId = null,
		public ?string $stateId = null,
		public ?string $referenceCommentId = null,
		public ?string $sourceCommentId = null,
		public ?float $boardOrder = null,
		public ?float $sortOrder = null,
		public ?float $subIssueSortOrder = null,
		public ?string $dueDate = null,
		public ?string $createAsUser = null,
		public ?string $displayIconUrl = null,
		public ?bool $preserveSortOrderOnCreate = null,
		public ?CarbonImmutable $createdAt = null,
		public ?CarbonImmutable $slaBreachesAt = null,
		public ?string $templateId = null
	) {
	}
}
