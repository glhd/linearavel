<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationIpRestrictionInput */
class OrganizationIpRestrictionInput
{
	public function __construct(public string $range, public string $type, public bool $enabled, public ?string $description = null)
	{
	}
}
