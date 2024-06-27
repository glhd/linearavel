<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\IntegrationService;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueSearchResult */
class IssueSearchResult extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
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
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|float|null $estimate,
		#[LinearDate]
		public Optional|CarbonImmutable|null $startedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $completedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $startedTriageAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $triagedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $canceledAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $autoClosedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $autoArchivedAt,
		public Optional|string|null $dueDate,
		#[LinearDate]
		public Optional|CarbonImmutable|null $slaStartedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $slaBreachesAt,
		public Optional|bool|null $trashed,
		#[LinearDate]
		public Optional|CarbonImmutable|null $snoozedUntilAt,
		public Optional|Cycle|null $cycle,
		public Optional|Project|null $project,
		public Optional|ProjectMilestone|null $projectMilestone,
		public Optional|Template|null $lastAppliedTemplate,
		public Optional|User|null $creator,
		public Optional|ExternalUser|null $externalUserCreator,
		public Optional|User|null $assignee,
		public Optional|User|null $snoozedBy,
		public Optional|float|null $subIssueSortOrder,
		public Optional|Comment|null $sourceComment,
		public Optional|IntegrationService|null $integrationSourceType,
		public Optional|ActorBot|null $botActor,
		public Optional|Favorite|null $favorite,
		public Optional|Issue|null $parent,
		public Optional|string|null $description,
		public Optional|string|null $descriptionData,
		public Optional|string|null $descriptionState
	) {
	}
}
