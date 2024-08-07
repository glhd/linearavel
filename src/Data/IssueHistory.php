<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
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
		public Optional|User|null $actor,
		public Optional|string|null $actorId,
		public Optional|bool|null $updatedDescription,
		public Optional|string|null $fromTitle,
		public Optional|string|null $toTitle,
		public Optional|User|null $fromAssignee,
		public Optional|string|null $fromAssigneeId,
		public Optional|User|null $toAssignee,
		public Optional|string|null $toAssigneeId,
		public Optional|float|null $fromPriority,
		public Optional|float|null $toPriority,
		public Optional|Team|null $fromTeam,
		public Optional|string|null $fromTeamId,
		public Optional|Team|null $toTeam,
		public Optional|string|null $toTeamId,
		public Optional|Issue|null $fromParent,
		public Optional|string|null $fromParentId,
		public Optional|Issue|null $toParent,
		public Optional|string|null $toParentId,
		public Optional|WorkflowState|null $fromState,
		public Optional|string|null $fromStateId,
		public Optional|WorkflowState|null $toState,
		public Optional|string|null $toStateId,
		public Optional|Cycle|null $fromCycle,
		public Optional|string|null $fromCycleId,
		public Optional|Cycle|null $toCycle,
		public Optional|string|null $toCycleId,
		public Optional|Project|null $toConvertedProject,
		public Optional|string|null $toConvertedProjectId,
		public Optional|Project|null $fromProject,
		public Optional|string|null $fromProjectId,
		public Optional|Project|null $toProject,
		public Optional|string|null $toProjectId,
		public Optional|float|null $fromEstimate,
		public Optional|float|null $toEstimate,
		public Optional|bool|null $archived,
		public Optional|bool|null $trashed,
		public Optional|IssueImport|null $issueImport,
		public Optional|Attachment|null $attachment,
		public Optional|string|null $attachmentId,
		/** @var Collection<int, string> */
		public Optional|Collection|null $addedLabelIds,
		/** @var Collection<int, string> */
		public Optional|Collection|null $removedLabelIds,
		/** @var Collection<int, IssueRelationHistoryPayload> */
		public Optional|Collection|null $relationChanges,
		public Optional|bool|null $autoClosed,
		public Optional|bool|null $autoArchived,
		public Optional|string|null $fromDueDate,
		public Optional|string|null $toDueDate,
		public Optional|string|null $changes,
		public Optional|ActorBot|null $botActor,
		/** @var Collection<int, IssueLabel> */
		public Optional|Collection|null $addedLabels,
		/** @var Collection<int, IssueLabel> */
		public Optional|Collection|null $removedLabels
	) {
	}
}
