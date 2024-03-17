<?php

namespace Glhd\Linearavel\Requests\Inputs;

class EmailUnsubscribeInput
{
	function __construct(public string $type, public string $token, public string $userId)
	{
	}
}
