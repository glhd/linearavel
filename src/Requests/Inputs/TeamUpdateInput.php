<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class TeamUpdateInput
{
	public function __construct(
		public ?string $name = null,
		public ?string $description = null,
		public ?string $key = null,
		public ?string $icon = null,
		public ?string $color = null,
		public ?bool $cyclesEnabled = null,
		public ?float $cycleStartDay = null,
		public ?int $cycleDuration = null,
		public ?int $cycleCooldownTime = null,
		public ?bool $cycleIssueAutoAssignStarted = null,
		public ?bool $cycleIssueAutoAssignCompleted = null,
		public ?bool $cycleLockToActive = null,
		public ?string $cycleEnabledStartWeek = null,
		public ?CarbonImmutable $cycleEnabledStartDate = null,
		public ?float $upcomingCycleCount = null,
		public ?string $timezone = null,
		public ?bool $issueOrderingNoPriorityFirst = null,
		public ?string $issueEstimationType = null,
		public ?bool $issueEstimationAllowZero = null,
		public ?string $setIssueSortOrderOnStateChange = null,
		public ?bool $issueEstimationExtended = null,
		public ?float $defaultIssueEstimate = null,
		public ?string $draftWorkflowStateId = null,
		public ?string $startWorkflowStateId = null,
		public ?string $reviewWorkflowStateId = null,
		public ?string $mergeableWorkflowStateId = null,
		public ?string $mergeWorkflowStateId = null,
		public ?bool $slackNewIssue = null,
		public ?bool $slackIssueComments = null,
		public ?bool $slackIssueStatuses = null,
		public ?bool $groupIssueHistory = null,
		public ?string $defaultTemplateForMembersId = null,
		public ?string $defaultTemplateForNonMembersId = null,
		public ?string $defaultProjectTemplateId = null,
		public ?bool $private = null,
		public ?bool $triageEnabled = null,
		public ?bool $requirePriorityToLeaveTriage = null,
		public ?string $defaultIssueStateId = null,
		public ?float $autoClosePeriod = null,
		public ?string $autoCloseStateId = null,
		public ?float $autoArchivePeriod = null,
		public ?string $markedAsDuplicateWorkflowStateId = null,
		public ?bool $joinByDefault = null
	) {
	}
}
