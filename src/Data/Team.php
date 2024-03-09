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
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string $name,
		public Optional|string $key,
		public Optional|string|null $description,
		public Optional|string|null $icon,
		public Optional|string|null $color,
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
		public Optional|WorkflowState|null $defaultIssueState,
		public Optional|Template|null $defaultTemplateForMembers,
		public Optional|string|null $defaultTemplateForMembersId,
		public Optional|Template|null $defaultTemplateForNonMembers,
		public Optional|string|null $defaultTemplateForNonMembersId,
		public Optional|Template|null $defaultProjectTemplate,
		public Optional|WorkflowState|null $triageIssueState,
		public Optional|bool $private,
		public Optional|WorkflowState|null $draftWorkflowState,
		public Optional|WorkflowState|null $startWorkflowState,
		public Optional|WorkflowState|null $reviewWorkflowState,
		public Optional|WorkflowState|null $mergeableWorkflowState,
		public Optional|WorkflowState|null $mergeWorkflowState,
		public Optional|bool $groupIssueHistory,
		public Optional|bool $slackNewIssue,
		public Optional|bool $slackIssueComments,
		public Optional|bool $slackIssueStatuses,
		public Optional|float|null $autoClosePeriod,
		public Optional|string|null $autoCloseStateId,
		public Optional|float $autoArchivePeriod,
		public Optional|WorkflowState|null $markedAsDuplicateWorkflowState,
		public Optional|bool|null $joinByDefault,
		public Optional|string $cycleCalenderUrl,
		public Optional|IssueConnection $issues,
		public Optional|int $issueCount,
		public Optional|CycleConnection $cycles,
		public Optional|Cycle|null $activeCycle,
		public Optional|TriageResponsibility|null $triageResponsibility,
		public Optional|UserConnection $members,
		public Optional|TeamMembershipConnection $memberships,
		public Optional|ProjectConnection $projects,
		public Optional|WorkflowStateConnection $states,
		public Optional|GitAutomationStateConnection $gitAutomationStates,
		public Optional|TemplateConnection $templates,
		public Optional|IssueLabelConnection $labels,
		public Optional|WebhookConnection $webhooks,
		public Optional|IntegrationsSettings|null $integrationsSettings,
		public Optional|bool $issueSortOrderDefaultToBottom
	) {
	}
}
