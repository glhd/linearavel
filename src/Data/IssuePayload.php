<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssuePayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|Issue|null $issue, public Optional|bool $success)
	{
	}
}
