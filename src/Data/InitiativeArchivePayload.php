<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Initiative, Glhd\Linearavel\Data\Contracts\ArchivePayload;
class InitiativeArchivePayload extends Data implements ArchivePayload
{
    function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Initiative|null $entity)
    {
    }
}
