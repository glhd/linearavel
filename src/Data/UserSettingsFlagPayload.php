<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class UserSettingsFlagPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|string $flag, public Optional|int $value, public Optional|bool $success)
    {
    }
}
