<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IntegrationSettingsInput
{
	function __construct(
		public ?SlackSettingsInput $slack = null,
		public ?SlackAsksSettingsInput $slackAsks = null,
		public ?SlackPostSettingsInput $slackPost = null,
		public ?SlackPostSettingsInput $slackProjectPost = null,
		public ?SlackPostSettingsInput $slackOrgProjectUpdatesPost = null,
		public ?GoogleSheetsSettingsInput $googleSheets = null,
		public ?GitHubSettingsInput $gitHub = null,
		public ?GitHubPersonalSettingsInput $gitHubPersonal = null,
		public ?GitLabSettingsInput $gitLab = null,
		public ?SentrySettingsInput $sentry = null,
		public ?ZendeskSettingsInput $zendesk = null,
		public ?IntercomSettingsInput $intercom = null,
		public ?FrontSettingsInput $front = null,
		public ?JiraSettingsInput $jira = null,
		public ?NotionSettingsInput $notion = null,
		public ?OpsgenieInput $opsgenie = null,
		public ?PagerDutyInput $pagerDuty = null,
		public ?JiraPersonalSettingsInput $jiraPersonal = null
	) {
	}
}
