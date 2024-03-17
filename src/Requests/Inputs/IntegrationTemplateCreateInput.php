<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IntegrationTemplateCreateInput
{
	function __construct(public string $integrationId, public string $templateId, public ?string $id = null, public ?string $foreignEntityId = null)
	{
	}
}
