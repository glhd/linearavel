<?php

namespace Glhd\Linearavel\Requests\Inputs;

class OrganizationDomainCreateInput
{
	function __construct(public string $name, public ?string $id = null, public ?string $verificationEmail = null, public ?string $authType = null)
	{
	}
}
