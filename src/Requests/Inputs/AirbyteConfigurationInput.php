<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AirbyteConfigurationInput */
class AirbyteConfigurationInput
{
	public function __construct(public string $apiKey)
	{
	}
}
