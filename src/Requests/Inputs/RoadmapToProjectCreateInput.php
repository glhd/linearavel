<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/RoadmapToProjectCreateInput */
class RoadmapToProjectCreateInput
{
	public function __construct(public string $projectId, public string $roadmapId, public ?string $id = null, public ?float $sortOrder = null)
	{
	}
}
