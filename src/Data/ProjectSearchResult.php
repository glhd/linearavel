<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\DateResolutionType;
use Glhd\Linearavel\Data\Enums\Day;
use Glhd\Linearavel\Data\Enums\FrequencyResolutionType;
use Glhd\Linearavel\Data\Enums\ProjectUpdateHealthType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectSearchResult */
class ProjectSearchResult extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|FrequencyResolutionType $frequencyResolution,
		public Optional|string $name,
		public Optional|string $description,
		public Optional|string $slugId,
		public Optional|string $color,
		public Optional|ProjectStatus $status,
		public Optional|string $leadTeamId,
		/** @var Collection<int, Facet> */
		public Optional|Collection $facets,
		public Optional|float $sortOrder,
		public Optional|float $prioritySortOrder,
		public Optional|int $priority,
		/** @var Collection<int, float> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $issueCountHistory,
		/** @var Collection<int, float> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $completedIssueCountHistory,
		/** @var Collection<int, float> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $scopeHistory,
		/** @var Collection<int, float> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $completedScopeHistory,
		/** @var Collection<int, float> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $inProgressScopeHistory,
		public Optional|string $progressHistory,
		public Optional|string $currentProgress,
		public Optional|bool $slackNewIssue,
		public Optional|bool $slackIssueComments,
		public Optional|bool $slackIssueStatuses,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $labelIds,
		public Optional|string $url,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $previousIdentifiers,
		public Optional|InitiativeConnection $initiatives,
		public Optional|InitiativeToProjectConnection $initiativeToProjects,
		public Optional|TeamConnection $teams,
		public Optional|UserConnection $members,
		public Optional|ProjectUpdateConnection $projectUpdates,
		public Optional|DocumentConnection $documents,
		public Optional|ProjectMilestoneConnection $projectMilestones,
		public Optional|IssueConnection $issues,
		public Optional|EntityExternalLinkConnection $externalLinks,
		public Optional|ProjectAttachmentConnection $attachments,
		public Optional|int $resourceCount,
		public Optional|ProjectHistoryConnection $history,
		public Optional|ProjectLabelConnection $labels,
		public Optional|float $progress,
		public Optional|float $scope,
		public Optional|CommentConnection $comments,
		public Optional|ProjectRelationConnection $relations,
		public Optional|ProjectRelationConnection $inverseRelations,
		public Optional|CustomerNeedConnection $needs,
		public Optional|string $state,
		public Optional|string $priorityLabel,
		public Optional|string $metadata,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|float|null $updateReminderFrequencyInWeeks,
		public Optional|float|null $updateReminderFrequency,
		public Optional|Day|null $updateRemindersDay,
		public Optional|float|null $updateRemindersHour,
		public Optional|string|null $icon,
		public Optional|User|null $creator,
		public Optional|User|null $lead,
		public Optional|Team|null $leadTeam,
		#[LinearDate]
		public Optional|CarbonImmutable|null $projectUpdateRemindersPausedUntilAt,
		public Optional|string|null $startDate,
		public Optional|DateResolutionType|null $startDateResolution,
		public Optional|string|null $targetDate,
		public Optional|DateResolutionType|null $targetDateResolution,
		#[LinearDate]
		public Optional|CarbonImmutable|null $startedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $completedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $canceledAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $autoArchivedAt,
		public Optional|bool|null $trashed,
		public Optional|Issue|null $convertedFromIssue,
		public Optional|Template|null $lastAppliedTemplate,
		public Optional|ProjectUpdate|null $lastUpdate,
		public Optional|ProjectUpdateHealthType|null $health,
		#[LinearDate]
		public Optional|CarbonImmutable|null $healthUpdatedAt,
		public Optional|Favorite|null $favorite,
		public Optional|string|null $identifier,
		public Optional|IntegrationsSettings|null $integrationsSettings,
		public Optional|string|null $slackChannelId,
		public Optional|string|null $microsoftTeamsChannelId,
		public Optional|string|null $content,
		public Optional|string|null $contentState,
		public Optional|DocumentContent|null $documentContent,
		/** @var Collection<int, ExternalEntityInfo> */
		public Optional|Collection|null $syncedWith
	) {
	}
}
