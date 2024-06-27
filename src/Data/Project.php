<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\DateResolutionType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/Project */
class Project extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $name,
		public Optional|string $description,
		public Optional|string $slugId,
		public Optional|string $color,
		public Optional|ProjectStatus $status,
		public Optional|float $sortOrder,
		/** @var Collection<int, float> */
		public Optional|Collection $issueCountHistory,
		/** @var Collection<int, float> */
		public Optional|Collection $completedIssueCountHistory,
		/** @var Collection<int, float> */
		public Optional|Collection $scopeHistory,
		/** @var Collection<int, float> */
		public Optional|Collection $completedScopeHistory,
		/** @var Collection<int, float> */
		public Optional|Collection $inProgressScopeHistory,
		public Optional|bool $slackNewIssue,
		public Optional|bool $slackIssueComments,
		public Optional|bool $slackIssueStatuses,
		public Optional|string $url,
		public Optional|TeamConnection $teams,
		public Optional|UserConnection $members,
		public Optional|ProjectUpdateConnection $projectUpdates,
		public Optional|DocumentConnection $documents,
		public Optional|ProjectMilestoneConnection $projectMilestones,
		public Optional|IssueConnection $issues,
		public Optional|ProjectLinkConnection $links,
		public Optional|float $progress,
		public Optional|float $scope,
		public Optional|string $state,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $icon,
		public Optional|User|null $creator,
		public Optional|User|null $lead,
		#[LinearDate]
		public Optional|CarbonImmutable|null $projectUpdateRemindersPausedUntilAt,
		public Optional|string|null $startDate,
		public Optional|DateResolutionType|null $startDateResolution,
		public Optional|string|null $targetDate,
		public Optional|DateResolutionType|null $targetDateResolution,
		#[LinearDate]
		public Optional|CarbonImmutable|null $startedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $pausedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $completedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $canceledAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $autoArchivedAt,
		public Optional|bool|null $trashed,
		public Optional|Issue|null $convertedFromIssue,
		public Optional|Template|null $lastAppliedTemplate,
		public Optional|IntegrationsSettings|null $integrationsSettings,
		public Optional|string|null $content,
		public Optional|string|null $contentState
	) {
	}
}
