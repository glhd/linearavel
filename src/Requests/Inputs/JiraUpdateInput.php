<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraUpdateInput */
class JiraUpdateInput
{
	public function __construct(public string $id, public ?bool $updateProjects = null, public ?bool $updateMetadata = null)
	{
	}
}
