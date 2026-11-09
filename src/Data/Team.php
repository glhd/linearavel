<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\TeamVisibility;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Team */
class Team extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|string $key,
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
		public Optional|bool $inheritWorkflowStatuses,
		public Optional|bool $inheritIssueEstimation,
		public Optional|string $issueEstimationType,
		public Optional|bool $issueOrderingNoPriorityFirst,
		public Optional|bool $issueEstimationAllowZero,
		public Optional|string $setIssueSortOrderOnStateChange,
		public Optional|bool $issueEstimationExtended,
		public Optional|float $defaultIssueEstimate,
		public Optional|bool $triageEnabled,
		public Optional|bool $requirePriorityToLeaveTriage,
		public Optional|bool $private,
		public Optional|string $securitySettings,
		public Optional|bool $scimManaged,
		public Optional|bool $groupIssueHistory,
		public Optional|bool $aiThreadSummariesEnabled,
		public Optional|bool $aiDiscussionSummariesEnabled,
		public Optional|bool $slackNewIssue,
		public Optional|bool $slackIssueComments,
		public Optional|bool $slackIssueStatuses,
		public Optional|float $autoArchivePeriod,
		public Optional|string $cycleCalenderUrl,
		public Optional|TeamVisibility $visibility,
		public Optional|string $displayName,
		public Optional|IssueConnection $issues,
		public Optional|int $issueCount,
		public Optional|int $ledInitiativeCount,
		public Optional|WorkflowDefinitionConnection $loops,
		public Optional|CycleConnection $cycles,
		public Optional|UserConnection $members,
		public Optional|bool $viewerCanJoin,
		public Optional|bool $viewerCanLeave,
		public Optional|TeamMembershipConnection $memberships,
		public Optional|ProjectConnection $projects,
		public Optional|ReleasePipelineConnection $releasePipelines,
		public Optional|WorkflowStateConnection $states,
		public Optional|GitAutomationStateConnection $gitAutomationStates,
		public Optional|TemplateConnection $templates,
		public Optional|IssueLabelConnection $labels,
		public Optional|WebhookConnection $webhooks,
		public Optional|bool $initiativesEnabled,
		public Optional|bool $issueSortOrderDefaultToBottom,
		public Optional|string $inviteHash,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $description,
		public Optional|string|null $icon,
		public Optional|string|null $color,
		#[LinearDate]
		public Optional|CarbonImmutable|null $retiredAt,
		public Optional|Team|null $parent,
		public Optional|WorkflowState|null $defaultIssueState,
		public Optional|Template|null $defaultTemplateForMembers,
		public Optional|string|null $defaultTemplateForMembersId,
		public Optional|Template|null $defaultTemplateForNonMembers,
		public Optional|string|null $defaultTemplateForNonMembersId,
		public Optional|Template|null $defaultProjectTemplate,
		public Optional|WorkflowState|null $triageIssueState,
		public Optional|bool|null $allMembersCanJoin,
		public Optional|string|null $scimGroupName,
		public Optional|WorkflowState|null $draftWorkflowState,
		public Optional|WorkflowState|null $startWorkflowState,
		public Optional|WorkflowState|null $reviewWorkflowState,
		public Optional|WorkflowState|null $mergeableWorkflowState,
		public Optional|WorkflowState|null $mergeWorkflowState,
		public Optional|float|null $autoClosePeriod,
		public Optional|string|null $autoCloseStateId,
		public Optional|bool|null $autoCloseParentIssues,
		public Optional|bool|null $autoCloseChildIssues,
		public Optional|WorkflowState|null $markedAsDuplicateWorkflowState,
		public Optional|Cycle|null $activeCycle,
		public Optional|TriageResponsibility|null $triageResponsibility,
		public Optional|TeamMembership|null $membership,
		public Optional|TeamMembership|null $viewerMembership,
		public Optional|IntegrationsSettings|null $integrationsSettings
	) {
	}
}
