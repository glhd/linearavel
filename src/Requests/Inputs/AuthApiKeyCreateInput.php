<?php

namespace Glhd\Linearavel\Requests\Inputs;

class AuthApiKeyCreateInput
{
	function __construct(public string $label, public string $key, public ?string $id = null)
	{
	}
}
