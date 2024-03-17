<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserSettings extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|string $notificationPreferences,
		/** @var Collection<int, string> */
		public Optional|Collection $unsubscribedFrom,
		public Optional|User $user,
		public Optional|bool $subscribedToChangelog,
		public Optional|bool $subscribedToDPA,
		public Optional|bool $subscribedToInviteAccepted,
		public Optional|bool $subscribedToPrivacyLegalUpdates,
		public Optional|bool $subscribedToUnreadNotificationsReminder,
		public Optional|bool $showFullUserNames,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $calendarHash
	) {
	}
}
