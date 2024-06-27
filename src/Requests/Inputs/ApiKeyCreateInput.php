<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/ApiKeyCreateInput */
class ApiKeyCreateInput
{
	public function __construct(public string $label, public string $key, public ?string $id = null)
	{
	}
}
