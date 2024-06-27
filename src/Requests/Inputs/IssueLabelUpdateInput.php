<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IssueLabelUpdateInput */
class IssueLabelUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $description = null, public ?string $parentId = null, public ?string $color = null)
	{
	}
}
