<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleasePipelineSortInput */
class ReleasePipelineSortInput
{
	public function __construct(public ?ReleasePipelineNameSortInput $name = null)
	{
	}
}
