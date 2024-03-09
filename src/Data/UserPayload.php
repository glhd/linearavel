<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\User;
class UserPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|User|null $user, public Optional|bool $success)
    {
    }
}
