<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\WorkflowState;
class WorkflowStatePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|WorkflowState $workflowState, public Optional|bool $success)
    {
    }
}
