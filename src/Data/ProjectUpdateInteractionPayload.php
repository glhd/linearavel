<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ProjectUpdateInteraction;
class ProjectUpdateInteractionPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|ProjectUpdateInteraction $projectUpdateInteraction, public Optional|bool $success)
    {
    }
}
