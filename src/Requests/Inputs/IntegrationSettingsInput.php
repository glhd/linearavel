<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IntegrationSettingsInput */
class IntegrationSettingsInput
{
	public function __construct(public ?SlackSettingsInput $slack = null, public ?SlackAsksSettingsInput $slackAsks = null, public ?SlackPostSettingsInput $slackPost = null, public ?SlackPostSettingsInput $slackProjectPost = null, public ?SlackPostSettingsInput $slackInitiativePost = null, public ?SlackPostSettingsInput $slackCustomViewNotifications = null, public ?SlackPostSettingsInput $slackOrgProjectUpdatesPost = null, public ?SlackPostSettingsInput $slackOrgInitiativeUpdatesPost = null, public ?GoogleSheetsSettingsInput $googleSheets = null, public ?GitHubSettingsInput $gitHub = null, public ?GitHubImportSettingsInput $gitHubImport = null, public ?GitHubPersonalSettingsInput $gitHubPersonal = null, public ?GitLabSettingsInput $gitLab = null, public ?SentrySettingsInput $sentry = null, public ?ZendeskSettingsInput $zendesk = null, public ?IntercomSettingsInput $intercom = null, public ?FrontSettingsInput $front = null, public ?GongSettingsInput $gong = null, public ?MicrosoftTeamsSettingsInput $microsoftTeams = null, public ?MicrosoftTeamsPostSettingsInput $microsoftTeamsProjectPost = null, public ?JiraSettingsInput $jira = null, public ?NotionSettingsInput $notion = null, public ?OpsgenieInput $opsgenie = null, public ?PagerDutyInput $pagerDuty = null, public ?LaunchDarklySettingsInput $launchDarkly = null, public ?JiraPersonalSettingsInput $jiraPersonal = null, public ?SalesforceSettingsInput $salesforce = null, public ?McpServerIntegrationSettingsInput $mcpServer = null)
	{
	}
}
