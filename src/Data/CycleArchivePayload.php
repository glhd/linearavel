<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Cycle, Glhd\Linearavel\Data\Contracts\ArchivePayload;
class CycleArchivePayload extends Data implements ArchivePayload
{
    function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Cycle|null $entity)
    {
    }
}
