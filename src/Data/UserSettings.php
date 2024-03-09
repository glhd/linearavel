<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use DateTimeInterface;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserSettings extends Data implements Node
{
	function __construct(
		public Optional|string $id,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $createdAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable $updatedAt,
		#[WithCast(DateTimeInterfaceCast::class, DateTimeInterface::RFC3339_EXTENDED)] public Optional|CarbonImmutable|null $archivedAt,
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
	) {
	}
}