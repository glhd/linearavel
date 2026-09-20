<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\InitiativeTab;
use Glhd\Linearavel\Data\Enums\PipelineTab;
use Glhd\Linearavel\Data\Enums\ProjectTab;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/FavoriteCreateInput */
class FavoriteCreateInput
{
	public function __construct(public ?string $id = null, public ?string $folderName = null, public ?string $liveFolderPreset = null, public ?string $parentId = null, public ?string $issueId = null, public ?string $facetId = null, public ?string $projectId = null, public ?ProjectTab $projectTab = null, public ?string $predefinedViewType = null, public ?string $predefinedViewTeamId = null, public ?string $cycleId = null, public ?string $customViewId = null, public ?string $documentId = null, public ?string $initiativeId = null, public ?InitiativeTab $initiativeTab = null, public ?string $labelId = null, public ?string $projectLabelId = null, public ?string $initiativeLabelId = null, public ?string $userId = null, public ?float $sortOrder = null, public ?string $customerId = null, public ?string $dashboardId = null, public ?string $pullRequestId = null, public ?string $aiConversationId = null, public ?string $releaseId = null, public ?string $releasePipelineId = null, public ?PipelineTab $pipelineTab = null, public ?string $releaseNoteId = null, public ?string $teamId = null, public ?string $workflowDefinitionId = null)
	{
	}
}
