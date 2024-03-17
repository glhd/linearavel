<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IntegrationRequestInput
{
	function __construct(public string $name, public ?string $email = null)
	{
	}
}
