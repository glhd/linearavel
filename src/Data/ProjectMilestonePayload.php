<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ProjectMilestone;
class ProjectMilestonePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|ProjectMilestone $projectMilestone, public Optional|bool $success)
    {
    }
}
