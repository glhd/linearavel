<?php

namespace Glhd\Linearavel\Requests\Inputs;

class RoadmapToProjectCreateInput
{
	function __construct(public string $projectId, public string $roadmapId, public ?string $id = null, public ?float $sortOrder = null)
	{
	}
}
