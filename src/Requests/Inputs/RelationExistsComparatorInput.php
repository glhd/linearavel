<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/RelationExistsComparator */
class RelationExistsComparatorInput
{
	public function __construct(public ?bool $eq = null, public ?bool $neq = null)
	{
	}
}
