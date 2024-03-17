<?php

namespace Glhd\Linearavel\Requests\Inputs;

class OrganizationDomainVerificationInput
{
	function __construct(public string $organizationDomainId, public string $verificationCode)
	{
	}
}
