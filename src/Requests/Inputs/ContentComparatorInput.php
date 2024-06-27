<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ContentComparator */
class ContentComparatorInput
{
	public function __construct(public ?string $contains = null, public ?string $notContains = null)
	{
	}
}
