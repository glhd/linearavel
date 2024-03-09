<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Project, Glhd\Linearavel\Data\Contracts\ArchivePayload;
class ProjectArchivePayload extends Data implements ArchivePayload
{
    function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Project|null $entity)
    {
    }
}
