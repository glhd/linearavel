<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Team, Glhd\Linearavel\Data\Contracts\ArchivePayload;
class TeamArchivePayload extends Data implements ArchivePayload
{
    function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Team|null $entity)
    {
    }
}
