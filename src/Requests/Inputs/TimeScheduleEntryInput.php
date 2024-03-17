<?php

namespace Glhd\Linearavel\Requests\Inputs;

use DateTimeInterface;

class TimeScheduleEntryInput
{
	public function __construct(public DateTimeInterface $startsAt, public DateTimeInterface $endsAt, public ?string $userId = null, public ?string $userEmail = null)
	{
	}
}
