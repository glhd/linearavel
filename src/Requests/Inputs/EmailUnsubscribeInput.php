<?php

namespace Glhd\Linearavel\Requests\Inputs;

class EmailUnsubscribeInput
{
	public function __construct(public string $type, public string $token, public string $userId)
	{
	}
}
