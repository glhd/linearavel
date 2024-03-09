<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\InitiativeToProject;
class InitiativeToProjectPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|InitiativeToProject $initiativeToProject, public Optional|bool $success)
    {
    }
}
