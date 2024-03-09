<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\TriageResponsibility;
class TriageResponsibilityPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|TriageResponsibility $triageResponsibility, public Optional|bool $success)
    {
    }
}
