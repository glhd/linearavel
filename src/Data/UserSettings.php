<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Carbon\CarbonImmutable, Spatie\LaravelData\Attributes\WithCast, Spatie\LaravelData\Casts\DateTimeInterfaceCast, DateTimeInterface, Glhd\Linearavel\Data\JSONObject, Illuminate\Support\Collection, Glhd\Linearavel\Data\User, Glhd\Linearavel\Data\Contracts\Node;
class UserSettings extends Data implements Node
{
    function __construct(
        public Optional|string $id,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
        #[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::DATE_RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
        public Optional|JSONObject $notificationPreferences,
        /** @var Collection<int, string> */
        public Collection $unsubscribedFrom,
        public Optional|User $user,
        public Optional|string|null $calendarHash,
        public Optional|bool $subscribedToChangelog,
        public Optional|bool $subscribedToDPA,
        public Optional|bool $subscribedToInviteAccepted,
        public Optional|bool $subscribedToPrivacyLegalUpdates,
        public Optional|bool $subscribedToUnreadNotificationsReminder,
        public Optional|bool $showFullUserNames
    )
    {
    }
}
