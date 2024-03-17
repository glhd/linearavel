<?php

namespace Glhd\Linearavel\Requests\Inputs;

use Carbon\CarbonImmutable;

class TimeScheduleEntryInput
{
	public function __construct(public CarbonImmutable $startsAt, public CarbonImmutable $endsAt, public ?string $userId = null, public ?string $userEmail = null)
	{
	}
}
