<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomViewSortInput */
class CustomViewSortInput
{
	public function __construct(public ?CustomViewNameSortInput $name = null, public ?CustomViewCreatedAtSortInput $createdAt = null, public ?CustomViewSharedSortInput $shared = null, public ?CustomViewUpdatedAtSortInput $updatedAt = null)
	{
	}
}
