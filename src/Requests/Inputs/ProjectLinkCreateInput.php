<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectLinkCreateInput */
class ProjectLinkCreateInput
{
	public function __construct(public string $url, public string $label, public string $projectId, public ?string $id = null, public ?float $sortOrder = null)
	{
	}
}
