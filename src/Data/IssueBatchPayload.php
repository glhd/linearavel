<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IssueBatchPayload extends Data
{
	function __construct(
		public Optional|float $lastSyncId,
		/** @var Collection<int, Issue> */
		public Optional|Collection $issues,
		public Optional|bool $success
	) {
	}
}
