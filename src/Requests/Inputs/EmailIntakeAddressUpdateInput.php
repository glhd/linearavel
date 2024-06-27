<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EmailIntakeAddressUpdateInput */
class EmailIntakeAddressUpdateInput
{
	public function __construct(public bool $enabled)
	{
	}
}
