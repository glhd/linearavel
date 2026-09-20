<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Entity;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Contracts\Notification;
use Glhd\Linearavel\Data\Enums\NotificationCategory;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/PullRequestNotification */
class PullRequestNotification extends Data implements Notification, Entity, Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $type,
		public Optional|User $user,
		public Optional|NotificationCategory $category,
		public Optional|string $url,
		public Optional|string $inboxUrl,
		public Optional|string $title,
		public Optional|string $subtitle,
		public Optional|bool $isLinearActor,
		public Optional|string $actorAvatarColor,
		public Optional|bool $actorInactive,
		public Optional|string $groupingKey,
		public Optional|float $groupingPriority,
		public Optional|string $pullRequestId,
		public Optional|PullRequest $pullRequest,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|User|null $actor,
		public Optional|ExternalUser|null $externalUserActor,
		#[LinearDate]
		public Optional|CarbonImmutable|null $readAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $emailedAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $snoozedUntilAt,
		#[LinearDate]
		public Optional|CarbonImmutable|null $unsnoozedAt,
		public Optional|string|null $actorAvatarUrl,
		public Optional|string|null $actorInitials,
		public Optional|string|null $issueStatusType,
		public Optional|string|null $projectUpdateHealth,
		public Optional|string|null $initiativeUpdateHealth,
		public Optional|ActorBot|null $botActor,
		public Optional|string|null $pullRequestCommentId
	) {
	}
}
