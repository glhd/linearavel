<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Entity;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Contracts\Notification;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProjectNotification extends Data implements Notification, Entity, Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $type,
		public Optional|User $user,
		public Optional|Project $project,
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
		public Optional|ProjectUpdate|null $projectUpdate
	) {
	}
}
