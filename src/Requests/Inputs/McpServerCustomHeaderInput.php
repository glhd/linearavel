<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/McpServerCustomHeaderInput */
class McpServerCustomHeaderInput
{
	public function __construct(public string $name, public string $value)
	{
	}
}
