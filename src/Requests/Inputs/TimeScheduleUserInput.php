<?php

namespace Glhd\Linearavel\Requests\Inputs;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TimeScheduleUserInput */
class TimeScheduleUserInput
{
	public function __construct(public ?string $userId = null, public ?string $userEmail = null)
	{
	}
}
