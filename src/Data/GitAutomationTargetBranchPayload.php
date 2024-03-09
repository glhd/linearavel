<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\GitAutomationTargetBranch;
class GitAutomationTargetBranchPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|GitAutomationTargetBranch $targetBranch, public Optional|bool $success)
    {
    }
}
