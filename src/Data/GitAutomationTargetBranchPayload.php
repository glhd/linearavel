<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class GitAutomationTargetBranchPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|GitAutomationTargetBranch $targetBranch, public Optional|bool $success)
	{
	}
}
