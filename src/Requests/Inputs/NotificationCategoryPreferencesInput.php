<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/NotificationCategoryPreferencesInput */
class NotificationCategoryPreferencesInput
{
	public function __construct(public ?PartialNotificationChannelPreferencesInput $assignments = null, public ?PartialNotificationChannelPreferencesInput $statusChanges = null, public ?PartialNotificationChannelPreferencesInput $commentsAndReplies = null, public ?PartialNotificationChannelPreferencesInput $mentions = null, public ?PartialNotificationChannelPreferencesInput $reactions = null, public ?PartialNotificationChannelPreferencesInput $subscriptions = null, public ?PartialNotificationChannelPreferencesInput $documentChanges = null, public ?PartialNotificationChannelPreferencesInput $postsAndUpdates = null, public ?PartialNotificationChannelPreferencesInput $reminders = null, public ?PartialNotificationChannelPreferencesInput $reviews = null, public ?PartialNotificationChannelPreferencesInput $loops = null, public ?PartialNotificationChannelPreferencesInput $appsAndIntegrations = null, public ?PartialNotificationChannelPreferencesInput $triage = null, public ?PartialNotificationChannelPreferencesInput $customers = null, public ?PartialNotificationChannelPreferencesInput $feed = null, public ?PartialNotificationChannelPreferencesInput $billing = null)
	{
	}
}
