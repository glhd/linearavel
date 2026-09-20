<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/McpServerIntegrationSettingsInput */
class McpServerIntegrationSettingsInput
{
	public function __construct(public ?string $name = null)
	{
	}
}
