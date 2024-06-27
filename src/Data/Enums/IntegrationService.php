<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/IntegrationService */
enum IntegrationService: string
{
	case airbyte = 'airbyte';
	case discord = 'discord';
	case figma = 'figma';
	case figmaPlugin = 'figmaPlugin';
	case front = 'front';
	case github = 'github';
	case githubCommit = 'githubCommit';
	case githubPersonal = 'githubPersonal';
	case gitlab = 'gitlab';
	case googleCalendarPersonal = 'googleCalendarPersonal';
	case googleSheets = 'googleSheets';
	case intercom = 'intercom';
	case jira = 'jira';
	case jiraPersonal = 'jiraPersonal';
	case loom = 'loom';
	case notion = 'notion';
	case opsgenie = 'opsgenie';
	case pagerDuty = 'pagerDuty';
	case slack = 'slack';
	case slackAsks = 'slackAsks';
	case slackOrgProjectUpdatesPost = 'slackOrgProjectUpdatesPost';
	case slackPersonal = 'slackPersonal';
	case slackPost = 'slackPost';
	case slackProjectPost = 'slackProjectPost';
	case slackProjectUpdatesPost = 'slackProjectUpdatesPost';
	case sentry = 'sentry';
	case zendesk = 'zendesk';
}
