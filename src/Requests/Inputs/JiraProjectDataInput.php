<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/JiraProjectDataInput */
class JiraProjectDataInput
{
	public function __construct(public string $id, public string $key, public string $name)
	{
	}
}
