<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationLinearAgentMcpServerAllowlistEntryInput */
class OrganizationLinearAgentMcpServerAllowlistEntryInput
{
	public function __construct(public string $url, public ?string $knownIntegrationKey = null)
	{
	}
}
