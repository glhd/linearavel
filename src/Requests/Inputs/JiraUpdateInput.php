<?php

namespace Glhd\Linearavel\Requests\Inputs;

class JiraUpdateInput
{
	public function __construct(public string $id, public ?bool $updateProjects = null, public ?bool $updateMetadata = null)
	{
	}
}
