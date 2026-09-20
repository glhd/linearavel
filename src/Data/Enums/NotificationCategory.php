<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/NotificationCategory */
enum NotificationCategory: string
{
	case assignments = 'assignments';
	case statusChanges = 'statusChanges';
	case commentsAndReplies = 'commentsAndReplies';
	case mentions = 'mentions';
	case reactions = 'reactions';
	case subscriptions = 'subscriptions';
	case documentChanges = 'documentChanges';
	case postsAndUpdates = 'postsAndUpdates';
	case reminders = 'reminders';
	case reviews = 'reviews';
	case loops = 'loops';
	case appsAndIntegrations = 'appsAndIntegrations';
	case triage = 'triage';
	case customers = 'customers';
	case feed = 'feed';
	case billing = 'billing';
	case system = 'system';
}
