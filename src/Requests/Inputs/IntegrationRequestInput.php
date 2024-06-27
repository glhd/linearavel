<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IntegrationRequestInput */
class IntegrationRequestInput
{
	public function __construct(public string $name, public ?string $email = null)
	{
	}
}
