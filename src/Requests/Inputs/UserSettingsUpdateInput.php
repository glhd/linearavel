<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Illuminate\Support\Collection;

class UserSettingsUpdateInput
{
	function __construct(
		/** @var Collection<int, string> */
		public Collection $unsubscribedFrom,
		public ?string $settings = null,
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
