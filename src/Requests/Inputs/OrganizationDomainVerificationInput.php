<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/OrganizationDomainVerificationInput */
class OrganizationDomainVerificationInput
{
	public function __construct(public string $organizationDomainId, public string $verificationCode)
	{
	}
}
