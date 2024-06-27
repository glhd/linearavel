<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/EmailUnsubscribeInput */
class EmailUnsubscribeInput
{
	public function __construct(public string $type, public string $token, public string $userId)
	{
	}
}
