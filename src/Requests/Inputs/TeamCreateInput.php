<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TeamCreateInput */
class TeamCreateInput
{
	public function __construct(
		public string $name,
		public ?string $id = null,
		public ?string $description = null,
		public ?string $key = null,
		public ?string $icon = null,
		public ?string $color = null,
		public ?string $organizationId = null,
		public ?bool $cyclesEnabled = null,
		public ?float $cycleStartDay = null,
		public ?int $cycleDuration = null,
		public ?int $cycleCooldownTime = null,
		public ?bool $cycleIssueAutoAssignStarted = null,
		public ?bool $cycleIssueAutoAssignCompleted = null,
		public ?bool $cycleLockToActive = null,
		public ?float $upcomingCycleCount = null,
		public ?bool $triageEnabled = null,
		public ?bool $requirePriorityToLeaveTriage = null,
		public ?string $timezone = null,
		public ?bool $issueOrderingNoPriorityFirst = null,
		public ?string $issueEstimationType = null,
		public ?bool $issueEstimationAllowZero = null,
		public ?string $setIssueSortOrderOnStateChange = null,
		public ?bool $issueEstimationExtended = null,
		public ?float $defaultIssueEstimate = null,
		public ?bool $groupIssueHistory = null,
		public ?string $defaultTemplateForMembersId = null,
		public ?string $defaultTemplateForNonMembersId = null,
		public ?string $defaultProjectTemplateId = null,
		public ?bool $private = null,
		public ?float $autoClosePeriod = null,
		public ?string $autoCloseStateId = null,
		public ?float $autoArchivePeriod = null,
		public ?string $markedAsDuplicateWorkflowStateId = null
	) {
	}
}
