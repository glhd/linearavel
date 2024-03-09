<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Project;
class ProjectPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Project|null $project, public Optional|bool $success)
    {
    }
}
