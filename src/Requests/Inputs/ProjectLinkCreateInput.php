<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ProjectLinkCreateInput
{
	public function __construct(public string $url, public string $label, public string $projectId, public ?string $id = null, public ?float $sortOrder = null)
	{
	}
}
