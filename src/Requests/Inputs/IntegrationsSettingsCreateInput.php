<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IntegrationsSettingsCreateInput
{
	public function __construct(
		public ?bool $slackIssueCreated = null,
		public ?bool $slackIssueNewComment = null,
		public ?bool $slackIssueStatusChangedDone = null,
		public ?bool $slackIssueStatusChangedAll = null,
		public ?bool $slackProjectUpdateCreated = null,
		public ?bool $slackProjectUpdateCreatedToTeam = null,
		public ?bool $slackProjectUpdateCreatedToWorkspace = null,
		public ?bool $slackIssueAddedToTriage = null,
		public ?bool $slackIssueSlaHighRisk = null,
		public ?bool $slackIssueSlaBreached = null,
		public ?string $id = null,
		public ?string $teamId = null,
		public ?string $projectId = null
	) {
	}
}
