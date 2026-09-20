<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;
use Glhd\Linearavel\Data\Enums\FeedSummarySchedule;
use Glhd\Linearavel\Data\Enums\InboxBadgeScope;
use Illuminate\Support\Collection;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/UserSettingsUpdateInput */
class UserSettingsUpdateInput
{
	public function __construct(
		public ?string $settings = null,
		/** @var iterable<string>|Collection<int, string> */
		public ?iterable $unsubscribedFrom = null,
		public ?bool $subscribedToChangelog = null,
		public ?bool $subscribedToDPA = null,
		public ?bool $subscribedToInviteAccepted = null,
		public ?bool $subscribedToPrivacyLegalUpdates = null,
		public ?bool $subscribedToGeneralMarketingCommunications = null,
		public ?NotificationCategoryPreferencesInput $notificationCategoryPreferences = null,
		public ?PartialNotificationChannelPreferencesInput $notificationChannelPreferences = null,
		public ?NotificationDeliveryPreferencesInput $notificationDeliveryPreferences = null,
		public ?string $usageWarningHistory = null,
		public ?FeedSummarySchedule $feedSummarySchedule = null,
		public ?DateTimeInterface $feedLastSeenTime = null,
		public ?bool $priorityInboxEnabled = null,
		public ?InboxBadgeScope $inboxBadgeScope = null
	) {
	}
}
