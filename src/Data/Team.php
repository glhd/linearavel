<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class Team extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|string $name,
		public Optional|string $key,
		public Optional|string|null $description = null,
		public Optional|string|null $icon = null,
		public Optional|string|null $color = null,
		public Optional|Organization $organization,
		public Optional|bool $cyclesEnabled,
		public Optional|float $cycleStartDay,
		public Optional|float $cycleDuration,
		public Optional|float $cycleCooldownTime,
		public Optional|bool $cycleIssueAutoAssignStarted,
		public Optional|bool $cycleIssueAutoAssignCompleted,
		public Optional|bool $cycleLockToActive,
		public Optional|float $upcomingCycleCount,
		public Optional|string $timezone,
		public Optional|string $inviteHash,
		public Optional|string $issueEstimationType,
		public Optional|bool $issueOrderingNoPriorityFirst,
		public Optional|bool $issueEstimationAllowZero,
		public Optional|string $setIssueSortOrderOnStateChange,
		public Optional|bool $issueEstimationExtended,
		public Optional|float $defaultIssueEstimate,
		public Optional|bool $triageEnabled,
		public Optional|bool $requirePriorityToLeaveTriage,
		public Optional|WorkflowState|null $defaultIssueState = null,
		public Optional|Template|null $defaultTemplateForMembers = null,
		public Optional|string|null $defaultTemplateForMembersId = null,
		public Optional|Template|null $defaultTemplateForNonMembers = null,
		public Optional|string|null $defaultTemplateForNonMembersId = null,
		public Optional|Template|null $defaultProjectTemplate = null,
		public Optional|WorkflowState|null $triageIssueState = null,
		public Optional|bool $private,
		public Optional|WorkflowState|null $draftWorkflowState = null,
		public Optional|WorkflowState|null $startWorkflowState = null,
		public Optional|WorkflowState|null $reviewWorkflowState = null,
		public Optional|WorkflowState|null $mergeableWorkflowState = null,
		public Optional|WorkflowState|null $mergeWorkflowState = null,
		public Optional|bool $groupIssueHistory,
		public Optional|bool $slackNewIssue,
		public Optional|bool $slackIssueComments,
		public Optional|bool $slackIssueStatuses,
		public Optional|float|null $autoClosePeriod = null,
		public Optional|string|null $autoCloseStateId = null,
		public Optional|float $autoArchivePeriod,
		public Optional|WorkflowState|null $markedAsDuplicateWorkflowState = null,
		public Optional|bool|null $joinByDefault = null,
		public Optional|string $cycleCalenderUrl,
		public Optional|IssueConnection $issues,
		public Optional|int $issueCount,
		public Optional|CycleConnection $cycles,
		public Optional|Cycle|null $activeCycle = null,
		public Optional|TriageResponsibility|null $triageResponsibility = null,
		public Optional|UserConnection $members,
		public Optional|TeamMembershipConnection $memberships,
		public Optional|ProjectConnection $projects,
		public Optional|WorkflowStateConnection $states,
		public Optional|GitAutomationStateConnection $gitAutomationStates,
		public Optional|TemplateConnection $templates,
		public Optional|IssueLabelConnection $labels,
		public Optional|WebhookConnection $webhooks,
		public Optional|IntegrationsSettings|null $integrationsSettings = null,
		public Optional|bool $issueSortOrderDefaultToBottom
	) {
	}
}
