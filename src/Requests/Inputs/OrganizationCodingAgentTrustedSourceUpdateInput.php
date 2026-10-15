<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationCodingAgentTrustedSourceUpdateInput */
class OrganizationCodingAgentTrustedSourceUpdateInput
{
	public function __construct(public string $key, public bool $allowed)
	{
	}
}
