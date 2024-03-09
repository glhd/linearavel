<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Initiative;
class InitiativePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Initiative $initiative, public Optional|bool $success)
    {
    }
}
