<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IntegrationCustomerDataAttributesRefreshInput */
class IntegrationCustomerDataAttributesRefreshInput
{
	public function __construct(public string $service)
	{
	}
}
