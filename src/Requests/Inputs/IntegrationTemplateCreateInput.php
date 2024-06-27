<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/IntegrationTemplateCreateInput */
class IntegrationTemplateCreateInput
{
	public function __construct(public string $integrationId, public string $templateId, public ?string $id = null, public ?string $foreignEntityId = null)
	{
	}
}
