<?php

namespace Glhd\Linearavel\Requests\Inputs;

class OrganizationDomainCreateInput
{
	public function __construct(public string $name, public ?string $id = null, public ?string $verificationEmail = null, public ?string $authType = null)
	{
	}
}
