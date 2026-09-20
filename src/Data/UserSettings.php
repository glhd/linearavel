<?php

namespace Glhd\Linearavel\Data;

use Carbon\CarbonImmutable;
use Glhd\Linearavel\Data\Casts\LinearDate;
use Glhd\Linearavel\Data\Contracts\Node;
use Glhd\Linearavel\Data\Enums\FeedSummarySchedule;
use Glhd\Linearavel\Data\Enums\PullRequestMergeMethod;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/UserSettings */
class UserSettings extends Data implements Node
{
	public function __construct(
		public Optional|string $id,
		#[LinearDate]
		public Optional|CarbonImmutable $createdAt,
		#[LinearDate]
		public Optional|CarbonImmutable $updatedAt,
		public Optional|NotificationDeliveryPreferences $notificationDeliveryPreferences,
		/** @var Collection<int, string> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $unsubscribedFrom,
		public Optional|User $user,
		public Optional|bool $subscribedToChangelog,
		public Optional|bool $subscribedToDPA,
		public Optional|bool $subscribedToInviteAccepted,
		public Optional|bool $subscribedToPrivacyLegalUpdates,
		public Optional|bool $showFullUserNames,
		public Optional|bool $autoAssignToSelf,
		public Optional|NotificationCategoryPreferences $notificationCategoryPreferences,
		public Optional|NotificationChannelPreferences $notificationChannelPreferences,
		#[LinearDate]
		public Optional|CarbonImmutable|null $archivedAt,
		public Optional|string|null $calendarHash,
		public Optional|FeedSummarySchedule|null $feedSummarySchedule,
		#[LinearDate]
		public Optional|CarbonImmutable|null $feedLastSeenTime,
		public Optional|PullRequestMergeMethod|null $pullRequestMergeStrategyPreference,
		public Optional|UserSettingsTheme|null $theme
	) {
	}
}
