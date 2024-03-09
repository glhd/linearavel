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

class Issue extends Data implements Node
{
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|float $number,
		public Optional|string $title,
		public Optional|float $priority,
		public Optional|float|null $estimate,
		public Optional|float $boardOrder,
		public Optional|float $sortOrder,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $startedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $completedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $startedTriageAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $triagedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $canceledAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $autoClosedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $autoArchivedAt,
		public Optional|TimelessDate|null $dueDate,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $slaStartedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $slaBreachesAt,
		public Optional|bool|null $trashed,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $snoozedUntilAt,
		/** @var Collection<int, string> */
		public Optional|Collection $labelIds,
		public Optional|Team $team,
		public Optional|Cycle|null $cycle,
		public Optional|Project|null $project,
		public Optional|ProjectMilestone|null $projectMilestone,
		public Optional|Template|null $lastAppliedTemplate,
		/** @var Collection<int, string> */
		public Optional|Collection $previousIdentifiers,
		public Optional|User|null $creator,
		public Optional|ExternalUser|null $externalUserCreator,
		public Optional|User|null $assignee,
		public Optional|User|null $snoozedBy,
		public Optional|WorkflowState $state,
		public Optional|float|null $subIssueSortOrder,
		public Optional|string $priorityLabel,
		public Optional|Comment|null $sourceComment,
		public Optional|IntegrationService|null $integrationSourceType,
		public Optional|ActorBot|null $botActor,
		public Optional|Favorite|null $favorite,
		public Optional|string $identifier,
		public Optional|string $url,
		public Optional|string $branchName,
		public Optional|int $customerTicketCount,
		public Optional|UserConnection $subscribers,
		public Optional|Issue|null $parent,
		public Optional|IssueConnection $children,
		public Optional|CommentConnection $comments,
		public Optional|IssueHistoryConnection $history,
		public Optional|IssueLabelConnection $labels,
		public Optional|IssueRelationConnection $relations,
		public Optional|IssueRelationConnection $inverseRelations,
		public Optional|AttachmentConnection $attachments,
		public Optional|string|null $description,
		public Optional|JSON|null $descriptionData,
		public Optional|string|null $descriptionState
	) {
	}
}
