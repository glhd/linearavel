<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ProjectUpdate;
class ProjectUpdatePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|ProjectUpdate $projectUpdate, public Optional|bool $success)
    {
    }
}
