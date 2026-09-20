<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/NotificationCategoryPreferences */
class NotificationCategoryPreferences extends Data
{
	public function __construct(public Optional|NotificationChannelPreferences $assignments, public Optional|NotificationChannelPreferences $statusChanges, public Optional|NotificationChannelPreferences $commentsAndReplies, public Optional|NotificationChannelPreferences $mentions, public Optional|NotificationChannelPreferences $reactions, public Optional|NotificationChannelPreferences $subscriptions, public Optional|NotificationChannelPreferences $documentChanges, public Optional|NotificationChannelPreferences $postsAndUpdates, public Optional|NotificationChannelPreferences $reminders, public Optional|NotificationChannelPreferences $reviews, public Optional|NotificationChannelPreferences $loops, public Optional|NotificationChannelPreferences $appsAndIntegrations, public Optional|NotificationChannelPreferences $system, public Optional|NotificationChannelPreferences $triage, public Optional|NotificationChannelPreferences $customers, public Optional|NotificationChannelPreferences $feed, public Optional|NotificationChannelPreferences $billing)
	{
	}
}
