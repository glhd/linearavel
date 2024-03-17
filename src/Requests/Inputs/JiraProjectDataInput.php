<?php

namespace Glhd\Linearavel\Requests\Inputs;

class JiraProjectDataInput
{
	public function __construct(public string $id, public string $key, public string $name)
	{
	}
}
