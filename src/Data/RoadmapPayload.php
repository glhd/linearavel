<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Roadmap;
class RoadmapPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Roadmap $roadmap, public Optional|bool $success)
    {
    }
}
