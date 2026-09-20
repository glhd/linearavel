<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationDomainUpdateInput */
class OrganizationDomainUpdateInput
{
	public function __construct(public ?bool $disableOrganizationCreation = null)
	{
	}
}
