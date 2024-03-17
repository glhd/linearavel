<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssuePayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|bool $success, public Optional|Issue|null $issue = null)
	{
	}
}
