<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/WebhookResourceType */
enum WebhookResourceType: string
{
	case AgentSessionEvent = 'AgentSessionEvent';
	case Comment = 'Comment';
	case CustomerNeed = 'CustomerNeed';
	case Customer = 'Customer';
	case Cycle = 'Cycle';
	case Document = 'Document';
	case Reaction = 'Reaction';
	case AppUserNotification = 'AppUserNotification';
	case InitiativeUpdate = 'InitiativeUpdate';
	case Initiative = 'Initiative';
	case IssueLabel = 'IssueLabel';
	case IssueSLA = 'IssueSLA';
	case Attachment = 'Attachment';
	case Issue = 'Issue';
	case OAuthAuthorization = 'OAuthAuthorization';
	case PermissionChange = 'PermissionChange';
	case ProjectLabel = 'ProjectLabel';
	case ProjectUpdate = 'ProjectUpdate';
	case Project = 'Project';
	case ReleaseNote = 'ReleaseNote';
	case Release = 'Release';
	case User = 'User';
}
