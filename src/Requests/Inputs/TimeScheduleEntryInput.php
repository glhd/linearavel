<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/inputs/TimeScheduleEntryInput */
class TimeScheduleEntryInput
{
	public function __construct(public DateTimeInterface $startsAt, public DateTimeInterface $endsAt, public ?string $userId = null, public ?string $userEmail = null)
	{
	}
}
