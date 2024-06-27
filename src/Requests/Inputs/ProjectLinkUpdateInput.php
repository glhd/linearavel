<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ProjectLinkUpdateInput */
class ProjectLinkUpdateInput
{
	public function __construct(public ?string $url = null, public ?string $label = null, public ?float $sortOrder = null)
	{
	}
}
