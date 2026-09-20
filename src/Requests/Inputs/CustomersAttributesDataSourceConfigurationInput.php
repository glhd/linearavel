<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CustomersAttributesDataSourceConfigurationInput */
class CustomersAttributesDataSourceConfigurationInput
{
	public function __construct(public string $sourceType, public ?bool $allowManualEdits = null, public ?CustomersAttributesDataSourceIntegrationInput $integration = null, public ?string $attributesMapping = null, public ?string $attributesErrors = null)
	{
	}
}
