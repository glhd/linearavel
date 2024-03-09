<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\UserSettings;
class UserSettingsPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|UserSettings $userSettings, public Optional|bool $success)
    {
    }
}
