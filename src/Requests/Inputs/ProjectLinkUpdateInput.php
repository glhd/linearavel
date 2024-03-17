<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ProjectLinkUpdateInput
{
	public function __construct(public ?string $url = null, public ?string $label = null, public ?float $sortOrder = null)
	{
	}
}
