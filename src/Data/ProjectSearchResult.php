<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\DateResolutionType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectSearchResult extends Data implements Node
{
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string $name,
		public Optional|string $description,
		public Optional|string $slugId,
		public Optional|string|null $icon,
		public Optional|string $color,
		public Optional|ProjectStatus $status,
		public Optional|User|null $creator,
		public Optional|User|null $lead,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $projectUpdateRemindersPausedUntilAt,
		public Optional|string|null $startDate,
		public Optional|DateResolutionType|null $startDateResolution,
		public Optional|string|null $targetDate,
		public Optional|DateResolutionType|null $targetDateResolution,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $startedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $pausedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $completedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $canceledAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $autoArchivedAt,
		public Optional|bool|null $trashed,
		public Optional|float $sortOrder,
		public Optional|Issue|null $convertedFromIssue,
		public Optional|Template|null $lastAppliedTemplate,
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
		public Optional|IntegrationsSettings|null $integrationsSettings,
		public Optional|string|null $content,
		public Optional|string|null $contentState,
		public Optional|string $state,
		public Optional|string $metadata
	) {
	}
}
