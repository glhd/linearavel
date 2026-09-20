<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomerStatusUpdateInput */
class CustomerStatusUpdateInput
{
	public function __construct(public ?string $name = null, public ?string $color = null, public ?string $description = null, public ?float $position = null, public ?string $displayName = null)
	{
	}
}
