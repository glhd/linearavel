<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\CustomView, Glhd\Linearavel\Data\Cycle, Glhd\Linearavel\Data\IssueLabel, Glhd\Linearavel\Data\Project, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\ContextViewType, Glhd\Linearavel\Data\UserContextViewType, Illuminate\Support\Collection, Glhd\Linearavel\Data\Contracts\NotificationSubscription, Glhd\Linearavel\Data\Contracts\Entity, Glhd\Linearavel\Data\Contracts\Node;
class CycleNotificationSubscription extends Data implements NotificationSubscription, Entity, Node
{
    function __construct(
        public Optional|string $id,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
        public Optional|User $subscriber,
        public Optional|CustomView|null $customView,
        public Optional|Cycle $cycle,
        public Optional|IssueLabel|null $label,
        public Optional|Project|null $project,
        public Optional|Team|null $team,
        public Optional|User|null $user,
        public Optional|ContextViewType|null $contextViewType,
        public Optional|UserContextViewType|null $userContextViewType,
        public Optional|bool $active,
        /** @var Collection<int, string> */
        public Optional|Collection $notificationSubscriptionTypes
    )
    {
    }
}
