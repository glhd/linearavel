<?php

namespace Glhd\Linearavel\Requests\Inputs;

class ApiKeyCreateInput
{
	function __construct(public string $label, public string $key, public ?string $id = null)
	{
	}
}
