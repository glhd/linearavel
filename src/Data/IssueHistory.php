<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueHistory */
class IssueHistory extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|Issue $issue,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $actorId,
		public Optional|bool|null $updatedDescription,
		public Optional|string|null $fromTitle,
		public Optional|string|null $toTitle,
		public Optional|string|null $fromAssigneeId,
		public Optional|string|null $toAssigneeId,
		public Optional|float|null $fromPriority,
		public Optional|float|null $toPriority,
		public Optional|string|null $fromTeamId,
		public Optional|string|null $toTeamId,
		public Optional|string|null $fromParentId,
		public Optional|string|null $toParentId,
		public Optional|string|null $fromStateId,
		public Optional|string|null $toStateId,
		public Optional|string|null $fromCycleId,
		public Optional|string|null $toCycleId,
		public Optional|string|null $toConvertedProjectId,
		public Optional|string|null $fromProjectId,
		public Optional|string|null $toProjectId,
		public Optional|float|null $fromEstimate,
		public Optional|float|null $toEstimate,
		public Optional|bool|null $archived,
		public Optional|bool|null $trashed,
		public Optional|string|null $attachmentId,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection|null $addedLabelIds,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection|null $removedLabelIds,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection|null $addedToReleaseIds,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection|null $removedFromReleaseIds,
		/** @var Collection<int, IssueRelationHistoryPayload> */
		public Optional|Collection|null $relationChanges,
		public Optional|bool|null $autoClosed,
		public Optional|bool|null $autoArchived,
		public Optional|string|null $fromDueDate,
		public Optional|string|null $toDueDate,
		public Optional|string|null $customerNeedId,
		public Optional|string|null $changes,
		public Optional|User|null $actor,
		/** @var Collection<int, User> */
		public Optional|Collection|null $actors,
		/** @var Collection<int, User> */
		public Optional|Collection|null $descriptionUpdatedBy,
		public Optional|User|null $fromAssignee,
		public Optional|User|null $toAssignee,
		public Optional|Cycle|null $fromCycle,
		public Optional|Cycle|null $toCycle,
		public Optional|Project|null $toConvertedProject,
		public Optional|User|null $fromDelegate,
		public Optional|User|null $toDelegate,
		public Optional|Project|null $fromProject,
		public Optional|Project|null $toProject,
		public Optional|WorkflowState|null $fromState,
		public Optional|WorkflowState|null $toState,
		public Optional|Team|null $fromTeam,
		public Optional|Team|null $toTeam,
		public Optional|Issue|null $fromParent,
		public Optional|Issue|null $toParent,
		public Optional|Attachment|null $attachment,
		public Optional|IssueImport|null $issueImport,
		/** @var Collection<int, User> */
		public Optional|Collection|null $triageResponsibilityNotifiedUsers,
		public Optional|bool|null $triageResponsibilityAutoAssigned,
		public Optional|Team|null $triageResponsibilityTeam,
		public Optional|ProjectMilestone|null $fromProjectMilestone,
		public Optional|ProjectMilestone|null $toProjectMilestone,
		#[LinearDate]
		public Optional|CarbonImmutable|null $fromSlaStartedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $toSlaStartedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $fromSlaBreachesAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $toSlaBreachesAt,
		public Optional|bool|null $fromSlaBreached,
		public Optional|bool|null $toSlaBreached,
		public Optional|string|null $fromSlaType,
		public Optional|string|null $toSlaType,
		public Optional|ActorBot|null $botActor,
		/** @var Collection<int, IssueLabel> */
		public Optional|Collection|null $addedLabels,
		/** @var Collection<int, IssueLabel> */
		public Optional|Collection|null $removedLabels,
		/** @var Collection<int, Release> */
		public Optional|Collection|null $addedToReleases,
		/** @var Collection<int, Release> */
		public Optional|Collection|null $removedFromReleases,
		public Optional|IssueHistoryTriageRuleMetadata|null $triageRuleMetadata,
		public Optional|IssueHistoryWorkflowMetadata|null $workflowMetadata
	) {
	}
}
