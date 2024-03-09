<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ProjectLink;
class ProjectLinkPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|ProjectLink $projectLink, public Optional|bool $success)
    {
    }
}
