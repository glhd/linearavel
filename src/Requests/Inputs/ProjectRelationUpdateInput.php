<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectRelationUpdateInput */
class ProjectRelationUpdateInput
{
	public function __construct(public ?string $type = null, public ?string $projectId = null, public ?string $projectMilestoneId = null, public ?string $anchorType = null, public ?string $relatedProjectId = null, public ?string $relatedProjectMilestoneId = null, public ?string $relatedAnchorType = null)
	{
	}
}
