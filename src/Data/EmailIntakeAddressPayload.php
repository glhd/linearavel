<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\EmailIntakeAddress;
class EmailIntakeAddressPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|EmailIntakeAddress $emailIntakeAddress, public Optional|bool $success)
    {
    }
}
