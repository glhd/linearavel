<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/NotificationSubscriptionType */
enum NotificationSubscriptionType: string
{
	case customer = 'customer';
	case customView = 'customView';
	case cycle = 'cycle';
	case label = 'label';
	case issue = 'issue';
	case oauthClientApproval = 'oauthClientApproval';
	case project = 'project';
	case initiative = 'initiative';
	case document = 'document';
	case pullRequest = 'pullRequest';
	case team = 'team';
	case user = 'user';
	case workflowDefinition = 'workflowDefinition';
}
