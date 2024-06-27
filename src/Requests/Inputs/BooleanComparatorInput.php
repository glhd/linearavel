<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/BooleanComparator */
class BooleanComparatorInput
{
	public function __construct(public ?bool $eq = null, public ?bool $neq = null)
	{
	}
}
