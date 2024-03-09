<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class UserSettingsFlagsResetPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|bool $success)
    {
    }
}
