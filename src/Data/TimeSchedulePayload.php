<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\TimeSchedule;
class TimeSchedulePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|TimeSchedule $timeSchedule, public Optional|bool $success)
    {
    }
}
