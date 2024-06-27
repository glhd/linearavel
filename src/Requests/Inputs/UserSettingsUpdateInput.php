<?php

namespace Glhd\Linearavel\Requests\Inputs;

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
		public ?bool $subscribedToUnreadNotificationsReminder = null,
		public ?string $notificationPreferences = null,
		public ?string $usageWarningHistory = null
	) {
	}
}
