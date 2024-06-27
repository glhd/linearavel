<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/TimeSchedulePayload */
class TimeSchedulePayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|TimeSchedule $timeSchedule, public Optional|bool $success)
	{
	}
}
