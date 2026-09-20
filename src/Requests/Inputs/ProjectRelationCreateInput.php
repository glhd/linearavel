<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectRelationCreateInput */
class ProjectRelationCreateInput
{
	public function __construct(public string $type, public string $projectId, public string $anchorType, public string $relatedProjectId, public string $relatedAnchorType, public ?string $id = null, public ?string $projectMilestoneId = null, public ?string $relatedProjectMilestoneId = null)
	{
	}
}
