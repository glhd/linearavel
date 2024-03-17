<?php

namespace Glhd\Linearavel\Requests\Inputs;

class IntegrationRequestInput
{
	public function __construct(public string $name, public ?string $email = null)
	{
	}
}
