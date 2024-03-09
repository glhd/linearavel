<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\RoadmapToProject;
class RoadmapToProjectPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|RoadmapToProject $roadmapToProject, public Optional|bool $success)
    {
    }
}
