<?php

namespace Glhd\Linearavel\Requests\Inputs;

class JiraProjectDataInput
{
	function __construct(public string $id, public string $key, public string $name)
	{
	}
}
