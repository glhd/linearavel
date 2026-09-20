<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\IntegrationService;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
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
		public Optional|float $prioritySortOrder,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $labelIds,
		public Optional|Team $team,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $previousIdentifiers,
		public Optional|WorkflowState $state,
		public Optional|string $reactionData,
		public Optional|string $priorityLabel,
		public Optional|bool $inheritsSharedAccess,
		public Optional|DocumentConnection $documents,
		public Optional|string $identifier,
		public Optional|string $url,
		public Optional|string $branchName,
		public Optional|IssueSharedAccess $sharedAccess,
		public Optional|int $customerTicketCount,
		public Optional|UserConnection $subscribers,
		public Optional|IssueConnection $children,
		public Optional|CommentConnection $comments,
		public Optional|AgentSessionConnection $agentSessions,
		public Optional|AiPromptProgressConnection $aiPromptProgresses,
		public Optional|IssueHistoryConnection $history,
		public Optional|IssueLabelConnection $labels,
		public Optional|IssueRelationConnection $relations,
		public Optional|IssueRelationConnection $inverseRelations,
		public Optional|AttachmentConnection $attachments,
		public Optional|AttachmentConnection $formerAttachments,
		/** @var Collection<int, Reaction> */
		public Optional|Collection $reactions,
		public Optional|CustomerNeedConnection $needs,
		public Optional|CustomerNeedConnection $formerNeeds,
		public Optional|ReleaseConnection $releases,
		public Optional|IssueSuggestionConnection $suggestions,
		public Optional|IssueSuggestionConnection $incomingSuggestions,
		public Optional|IssueStateSpanConnection $stateHistory,
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
		public Optional|CarbonImmutable|null $slaMediumRiskAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $slaHighRiskAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $slaBreachesAt,
		public Optional|string|null $slaType,
		#[LinearDate]
		public Optional|CarbonImmutable|null $addedToProjectAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $addedToCycleAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $addedToTeamAt,
		public Optional|bool|null $trashed,
		#[LinearDate]
		public Optional|CarbonImmutable|null $snoozedUntilAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $suggestionsGeneratedAt,
		public Optional|string|null $activitySummary,
		public Optional|Summary|null $summary,
		public Optional|Cycle|null $cycle,
		public Optional|Project|null $project,
		public Optional|ProjectMilestone|null $projectMilestone,
		public Optional|Template|null $lastAppliedTemplate,
		public Optional|Template|null $recurringIssueTemplate,
		public Optional|User|null $creator,
		public Optional|ExternalUser|null $externalUserCreator,
		public Optional|User|null $assignee,
		public Optional|User|null $delegate,
		public Optional|User|null $snoozedBy,
		public Optional|float|null $subIssueSortOrder,
		public Optional|Comment|null $sourceComment,
		public Optional|bool|null $trusted,
		public Optional|IntegrationService|null $integrationSourceType,
		public Optional|ActorBot|null $botActor,
		public Optional|Favorite|null $favorite,
		public Optional|Issue|null $parent,
		public Optional|string|null $description,
		public Optional|string|null $descriptionState,
		public Optional|DocumentContent|null $documentContent,
		/** @var Collection<int, ExternalEntityInfo> */
		public Optional|Collection|null $syncedWith,
		public Optional|User|null $asksRequester,
		public Optional|ExternalUser|null $asksExternalUserRequester
	) {
	}
}
