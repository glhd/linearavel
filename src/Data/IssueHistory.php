<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueHistory extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)]
		public Optional|CarbonImmutable|null $archivedAt = null,
		public Optional|Issue $issue,
		public Optional|User|null $actor = null,
		public Optional|string|null $actorId = null,
		public Optional|bool|null $updatedDescription = null,
		public Optional|string|null $fromTitle = null,
		public Optional|string|null $toTitle = null,
		public Optional|User|null $fromAssignee = null,
		public Optional|string|null $fromAssigneeId = null,
		public Optional|User|null $toAssignee = null,
		public Optional|string|null $toAssigneeId = null,
		public Optional|float|null $fromPriority = null,
		public Optional|float|null $toPriority = null,
		public Optional|Team|null $fromTeam = null,
		public Optional|string|null $fromTeamId = null,
		public Optional|Team|null $toTeam = null,
		public Optional|string|null $toTeamId = null,
		public Optional|Issue|null $fromParent = null,
		public Optional|string|null $fromParentId = null,
		public Optional|Issue|null $toParent = null,
		public Optional|string|null $toParentId = null,
		public Optional|WorkflowState|null $fromState = null,
		public Optional|string|null $fromStateId = null,
		public Optional|WorkflowState|null $toState = null,
		public Optional|string|null $toStateId = null,
		public Optional|Cycle|null $fromCycle = null,
		public Optional|string|null $fromCycleId = null,
		public Optional|Cycle|null $toCycle = null,
		public Optional|string|null $toCycleId = null,
		public Optional|Project|null $toConvertedProject = null,
		public Optional|string|null $toConvertedProjectId = null,
		public Optional|Project|null $fromProject = null,
		public Optional|string|null $fromProjectId = null,
		public Optional|Project|null $toProject = null,
		public Optional|string|null $toProjectId = null,
		public Optional|float|null $fromEstimate = null,
		public Optional|float|null $toEstimate = null,
		public Optional|bool|null $archived = null,
		public Optional|bool|null $trashed = null,
		public Optional|IssueImport|null $issueImport = null,
		public Optional|Attachment|null $attachment = null,
		public Optional|string|null $attachmentId = null,
		/** @var Collection<int, string> */
		public Optional|Collection $addedLabelIds,
		/** @var Collection<int, string> */
		public Optional|Collection $removedLabelIds,
		/** @var Collection<int, IssueRelationHistoryPayload> */
		public Optional|Collection $relationChanges,
		public Optional|bool|null $autoClosed = null,
		public Optional|bool|null $autoArchived = null,
		public Optional|string|null $fromDueDate = null,
		public Optional|string|null $toDueDate = null,
		public Optional|string|null $changes = null,
		public Optional|ActorBot|null $botActor = null,
		/** @var Collection<int, IssueLabel> */
		public Optional|Collection $addedLabels,
		/** @var Collection<int, IssueLabel> */
		public Optional|Collection $removedLabels
	) {
	}
}
