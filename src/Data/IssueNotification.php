<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\ExternalUser, Glhd\Linearavel\Data\ActorBot, Glhd\Linearavel\Data\Issue, Glhd\Linearavel\Data\Comment, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\NotificationSubscription, Illuminate\Support\Collection, Glhd\Linearavel\Data\Contracts\Notification, Glhd\Linearavel\Data\Contracts\Entity, Glhd\Linearavel\Data\Contracts\Node;
class IssueNotification extends Data implements Notification, Entity, Node
{
    function __construct(
        public Optional|string $id,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
        public Optional|string $type,
        public Optional|User|null $actor,
        public Optional|ExternalUser|null $externalUserActor,
        public Optional|User $user,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $readAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $emailedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $snoozedUntilAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $unsnoozedAt,
        public Optional|ActorBot|null $botActor,
        public Optional|string|null $reactionEmoji,
        public Optional|Issue $issue,
        public Optional|Comment|null $comment,
        public Optional|Team $team,
        /** @var Collection<int, NotificationSubscription> */
        public Collection $subscriptions
    )
    {
    }
}
