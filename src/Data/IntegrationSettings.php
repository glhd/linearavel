<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IntegrationSettings extends Data
{
	public function __construct(
		public Optional|SlackSettings|null $slack = null,
		public Optional|SlackAsksSettings|null $slackAsks = null,
		public Optional|SlackPostSettings|null $slackPost = null,
		public Optional|SlackPostSettings|null $slackProjectPost = null,
		public Optional|SlackPostSettings|null $slackOrgProjectUpdatesPost = null,
		public Optional|GoogleSheetsSettings|null $googleSheets = null,
		public Optional|GitHubSettings|null $gitHub = null,
		public Optional|GitHubPersonalSettings|null $gitHubPersonal = null,
		public Optional|GitLabSettings|null $gitLab = null,
		public Optional|SentrySettings|null $sentry = null,
		public Optional|ZendeskSettings|null $zendesk = null,
		public Optional|IntercomSettings|null $intercom = null,
		public Optional|FrontSettings|null $front = null,
		public Optional|JiraSettings|null $jira = null,
		public Optional|NotionSettings|null $notion = null,
		public Optional|OpsgenieSettings|null $opsgenie = null,
		public Optional|PagerDutySettings|null $pagerDuty = null,
		public Optional|JiraPersonalSettings|null $jiraPersonal = null
	) {
	}
}
