<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Entity;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Glhd\Linearavel\Data\Enums\ContextViewType;
use Glhd\Linearavel\Data\Enums\UserContextViewType;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CustomViewNotificationSubscription extends Data implements NotificationSubscription, Entity, Node
{
#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt = null
        
public Optional|Cycle|null $cycle = null,
        
public Optional|IssueLabel|null $label = null,
        
public Optional|Project|null $project = null,
        
public Optional|Team|null $team = null,
        
public Optional|User|null $user = null,
        
public Optional|ContextViewType|null $contextViewType = null,
        
public Optional|UserContextViewType|null $userContextViewType = null,
        
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		public Optional|User $subscriber,
		public Optional|CustomView $customView,
		public Optional|bool $active,
		/** @var Collection<int, string> */
		public Optional|Collection $notificationSubscriptionTypes,
    )
    {
    }
}
