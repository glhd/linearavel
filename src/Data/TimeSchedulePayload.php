<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TimeSchedulePayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|TimeSchedule $timeSchedule, public Optional|bool $success)
	{
	}
}
