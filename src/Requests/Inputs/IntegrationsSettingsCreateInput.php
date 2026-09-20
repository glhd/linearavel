<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\ContextViewType;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IntegrationsSettingsCreateInput */
class IntegrationsSettingsCreateInput
{
	public function __construct(public ?bool $slackIssueCreated = null, public ?bool $slackIssueAddedToView = null, public ?bool $slackIssueNewComment = null, public ?bool $slackIssueStatusChangedDone = null, public ?bool $slackIssueStatusChangedAll = null, public ?bool $slackProjectUpdateCreated = null, public ?bool $slackProjectCommentCreated = null, public ?bool $microsoftTeamsProjectUpdateCreated = null, public ?bool $slackProjectUpdateCreatedToTeam = null, public ?bool $slackProjectUpdateCreatedToWorkspace = null, public ?bool $slackInitiativeUpdateCreated = null, public ?bool $slackInitiativeCommentCreated = null, public ?bool $slackIssueAddedToTriage = null, public ?bool $slackIssueSlaHighRisk = null, public ?bool $slackIssueSlaBreached = null, public ?string $id = null, public ?string $teamId = null, public ?string $projectId = null, public ?string $initiativeId = null, public ?string $customViewId = null, public ?ContextViewType $contextViewType = null)
	{
	}
}
