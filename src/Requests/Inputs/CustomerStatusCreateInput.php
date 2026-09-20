<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomerStatusCreateInput */
class CustomerStatusCreateInput
{
	public function __construct(public string $color, public ?string $id = null, public ?string $name = null, public ?string $description = null, public ?float $position = null, public ?string $displayName = null)
	{
	}
}
