<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class SynchronizedPayload extends Data
{
    function __construct(public Optional|float $lastSyncId)
    {
    }
}
