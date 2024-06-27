<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/CreateOrganizationInput */
class CreateOrganizationInput
{
	public function __construct(public string $name, public string $urlKey, public ?bool $domainAccess = null, public ?string $timezone = null, public ?string $utm = null)
	{
	}
}
