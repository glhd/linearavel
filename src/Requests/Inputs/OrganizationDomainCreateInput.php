<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationDomainCreateInput */
class OrganizationDomainCreateInput
{
	public function __construct(public string $name, public ?string $id = null, public ?string $verificationEmail = null, public ?string $authType = null)
	{
	}
}
