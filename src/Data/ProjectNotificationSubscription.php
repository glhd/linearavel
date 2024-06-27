<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Entity;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Glhd\Linearavel\Data\Enums\ContextViewType;
use Glhd\Linearavel\Data\Enums\UserContextViewType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/ProjectNotificationSubscription */
class ProjectNotificationSubscription extends Data implements NotificationSubscription, Entity, Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|User $subscriber,
		public Optional|Project $project,
		public Optional|bool $active,
		/** @var Collection<int, string> */
		public Optional|Collection $notificationSubscriptionTypes,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|CustomView|null $customView,
		public Optional|Cycle|null $cycle,
		public Optional|IssueLabel|null $label,
		public Optional|Team|null $team,
		public Optional|User|null $user,
		public Optional|ContextViewType|null $contextViewType,
		public Optional|UserContextViewType|null $userContextViewType
	) {
	}
}
