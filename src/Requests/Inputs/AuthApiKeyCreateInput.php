<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/AuthApiKeyCreateInput */
class AuthApiKeyCreateInput
{
	public function __construct(public string $label, public string $key, public ?string $id = null)
	{
	}
}
