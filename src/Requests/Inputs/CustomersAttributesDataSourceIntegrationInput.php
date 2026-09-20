<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Glhd\Linearavel\Data\Enums\IntegrationService;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomersAttributesDataSourceIntegrationInput */
class CustomersAttributesDataSourceIntegrationInput
{
	public function __construct(public IntegrationService $service)
	{
	}
}
