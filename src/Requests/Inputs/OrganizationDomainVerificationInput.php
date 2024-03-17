<?php

namespace Glhd\Linearavel\Requests\Inputs;

class OrganizationDomainVerificationInput
{
	public function __construct(public string $organizationDomainId, public string $verificationCode)
	{
	}
}
