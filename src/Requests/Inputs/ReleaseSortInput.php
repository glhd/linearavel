<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ReleaseSortInput */
class ReleaseSortInput
{
	public function __construct(public ?ReleaseStageSortInput $stage = null)
	{
	}
}
