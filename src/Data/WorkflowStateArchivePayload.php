<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\WorkflowState, Glhd\Linearavel\Data\Contracts\ArchivePayload;
class WorkflowStateArchivePayload extends Data implements ArchivePayload
{
    function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|WorkflowState|null $entity)
    {
    }
}
