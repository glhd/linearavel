<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IntegrationsSettingsUpdateInput */
class IntegrationsSettingsUpdateInput
{
	public function __construct(public ?bool $slackIssueCreated = null, public ?bool $slackIssueAddedToView = null, public ?bool $slackIssueNewComment = null, public ?bool $slackIssueStatusChangedDone = null, public ?bool $slackIssueStatusChangedAll = null, public ?bool $slackProjectUpdateCreated = null, public ?bool $slackProjectCommentCreated = null, public ?bool $microsoftTeamsProjectUpdateCreated = null, public ?bool $slackProjectUpdateCreatedToTeam = null, public ?bool $slackProjectUpdateCreatedToWorkspace = null, public ?bool $slackInitiativeUpdateCreated = null, public ?bool $slackInitiativeCommentCreated = null, public ?bool $slackIssueAddedToTriage = null, public ?bool $slackIssueSlaHighRisk = null, public ?bool $slackIssueSlaBreached = null)
	{
	}
}
