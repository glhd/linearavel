<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Team;
class TeamPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Team|null $team, public Optional|bool $success)
    {
    }
}
