<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Entity;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TeamNotificationSubscription extends Data implements NotificationSubscription, Entity, Node
{
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
		public Optional|User $subscriber,
		public Optional|CustomView|null $customView,
		public Optional|Cycle|null $cycle,
		public Optional|IssueLabel|null $label,
		public Optional|Project|null $project,
		public Optional|Team $team,
		public Optional|User|null $user,
		public Optional|ContextViewType|null $contextViewType,
		public Optional|UserContextViewType|null $userContextViewType,
		public Optional|bool $active,
		/** @var Collection<int, string> */
		public Collection $notificationSubscriptionTypes
	) {
	}
}
