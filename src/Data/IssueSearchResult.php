<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\IntegrationService;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueSearchResult extends Data implements Node
{
	#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt = null
        
public Optional|float|null $estimate = null,
        
#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $startedAt = null,
        
#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $completedAt = null,
        
#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $startedTriageAt = null,
        
#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $triagedAt = null,
        
#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $canceledAt = null,
        
#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $autoClosedAt = null,
        
#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $autoArchivedAt = null,
        
public Optional|string|null $dueDate = null,
        
#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $slaStartedAt = null,
        
#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $slaBreachesAt = null,
        
public Optional|bool|null $trashed = null,
        
#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $snoozedUntilAt = null,
        
public Optional|Cycle|null $cycle = null,
        
public Optional|Project|null $project = null,
        
public Optional|ProjectMilestone|null $projectMilestone = null,
        
public Optional|Template|null $lastAppliedTemplate = null,
        
public Optional|User|null $creator = null,
        
public Optional|ExternalUser|null $externalUserCreator = null,
        
public Optional|User|null $assignee = null,
        
public Optional|User|null $snoozedBy = null,
        
public Optional|float|null $subIssueSortOrder = null,
        
public Optional|Comment|null $sourceComment = null,
        
public Optional|IntegrationService|null $integrationSourceType = null,
        
public Optional|ActorBot|null $botActor = null,
        
public Optional|Favorite|null $favorite = null,
        
public Optional|Issue|null $parent = null,
        
public Optional|string|null $description = null,
        
public Optional|string|null $descriptionData = null,
        
public Optional|string|null $descriptionState = null,
        
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		public Optional|float $number,
		public Optional|string $title,
		public Optional|float $priority,
		public Optional|float $boardOrder,
		public Optional|float $sortOrder,
		/** @var Collection<int, string> */
		public Optional|Collection $labelIds,
		public Optional|Team $team,
		/** @var Collection<int, string> */
		public Optional|Collection $previousIdentifiers,
		public Optional|WorkflowState $state,
		public Optional|string $priorityLabel,
		public Optional|string $identifier,
		public Optional|string $url,
		public Optional|string $branchName,
		public Optional|int $customerTicketCount,
		public Optional|UserConnection $subscribers,
		public Optional|IssueConnection $children,
		public Optional|CommentConnection $comments,
		public Optional|IssueHistoryConnection $history,
		public Optional|IssueLabelConnection $labels,
		public Optional|IssueRelationConnection $relations,
		public Optional|IssueRelationConnection $inverseRelations,
		public Optional|AttachmentConnection $attachments,
		public Optional|string $metadata,
	) {
	}
}
