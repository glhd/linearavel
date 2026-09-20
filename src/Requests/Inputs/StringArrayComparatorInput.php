<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/StringArrayComparator */
class StringArrayComparatorInput
{
	public function __construct(public ?NumberComparatorInput $length = null, public ?StringItemComparatorInput $every = null, public ?StringItemComparatorInput $some = null)
	{
	}
}
