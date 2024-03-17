<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ContactSalesCreateInput
{
	function __construct(public string $name, public string $email, public ?string $companySize = null, public ?string $message = null)
	{
	}
}
