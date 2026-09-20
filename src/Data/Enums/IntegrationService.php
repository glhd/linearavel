<?php

namespace Glhd\Linearavel\Data\Enums;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/enums/IntegrationService */
enum IntegrationService: string
{
	case airbyte = 'airbyte';
	case datadog = 'datadog';
	case discord = 'discord';
	case figma = 'figma';
	case figmaPlugin = 'figmaPlugin';
	case front = 'front';
	case github = 'github';
	case gong = 'gong';
	case githubEnterpriseServer = 'githubEnterpriseServer';
	case githubCommit = 'githubCommit';
	case githubImport = 'githubImport';
	case githubPersonal = 'githubPersonal';
	case githubCodeAccessPersonal = 'githubCodeAccessPersonal';
	case gitlab = 'gitlab';
	case origin = 'origin';
	case googleCalendarPersonal = 'googleCalendarPersonal';
	case googleSheets = 'googleSheets';
	case intercom = 'intercom';
	case jira = 'jira';
	case jiraPersonal = 'jiraPersonal';
	case launchDarkly = 'launchDarkly';
	case launchDarklyPersonal = 'launchDarklyPersonal';
	case loom = 'loom';
	case notion = 'notion';
	case opsgenie = 'opsgenie';
	case pagerDuty = 'pagerDuty';
	case salesforce = 'salesforce';
	case slack = 'slack';
	case slackAsks = 'slackAsks';
	case asksWeb = 'asksWeb';
	case slackCustomViewNotifications = 'slackCustomViewNotifications';
	case slackOrgProjectUpdatesPost = 'slackOrgProjectUpdatesPost';
	case slackOrgInitiativeUpdatesPost = 'slackOrgInitiativeUpdatesPost';
	case slackPersonal = 'slackPersonal';
	case slackPost = 'slackPost';
	case slackProjectPost = 'slackProjectPost';
	case slackProjectUpdatesPost = 'slackProjectUpdatesPost';
	case slackInitiativePost = 'slackInitiativePost';
	case sentry = 'sentry';
	case zendesk = 'zendesk';
	case email = 'email';
	case mcpServerPersonal = 'mcpServerPersonal';
	case mcpServer = 'mcpServer';
	case microsoftTeams = 'microsoftTeams';
	case microsoftPersonal = 'microsoftPersonal';
	case microsoftTeamsProjectPost = 'microsoftTeamsProjectPost';
}
