<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationSettings extends Data
{
	function __construct(
		public Optional|SlackSettings|null $slack,
		public Optional|SlackAsksSettings|null $slackAsks,
		public Optional|SlackPostSettings|null $slackPost,
		public Optional|SlackPostSettings|null $slackProjectPost,
		public Optional|SlackPostSettings|null $slackOrgProjectUpdatesPost,
		public Optional|GoogleSheetsSettings|null $googleSheets,
		public Optional|GitHubSettings|null $gitHub,
		public Optional|GitHubPersonalSettings|null $gitHubPersonal,
		public Optional|GitLabSettings|null $gitLab,
		public Optional|SentrySettings|null $sentry,
		public Optional|ZendeskSettings|null $zendesk,
		public Optional|IntercomSettings|null $intercom,
		public Optional|FrontSettings|null $front,
		public Optional|JiraSettings|null $jira,
		public Optional|NotionSettings|null $notion,
		public Optional|OpsgenieSettings|null $opsgenie,
		public Optional|PagerDutySettings|null $pagerDuty,
		public Optional|JiraPersonalSettings|null $jiraPersonal
	) {
	}
}
