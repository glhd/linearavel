<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\GitAutomationState;
class GitAutomationStatePayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|GitAutomationState $gitAutomationState, public Optional|bool $success)
    {
    }
}
