<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Cycle;
class CyclePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Cycle|null $cycle, public Optional|bool $success)
    {
    }
}
