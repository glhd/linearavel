<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Entity;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Contracts\Notification;
use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueNotification */
class IssueNotification extends Data implements Notification, Entity, Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $type,
		public Optional|User $user,
		public Optional|Issue $issue,
		public Optional|Team $team,
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
		public Optional|ActorBot|null $botActor,
		public Optional|string|null $reactionEmoji,
		public Optional|Comment|null $comment,
		/** @var Collection<int, NotificationSubscription> */
		public Optional|Collection|null $subscriptions
	) {
	}
}
