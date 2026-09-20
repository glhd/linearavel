<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IntegrationUpdateInput */
class IntegrationUpdateInput
{
	public function __construct(public ?IntegrationSettingsInput $settings = null, public ?string $workflowDefinitionId = null, public ?string $workflowDefinitionDraftId = null)
	{
	}
}
