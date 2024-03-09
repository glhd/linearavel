<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueLabelPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|IssueLabel $issueLabel, public Optional|bool $success)
	{
	}
}
