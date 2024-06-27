<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/IssueBatchPayload */
class IssueBatchPayload extends Data
{
	public function __construct(
		public Optional|float $lastSyncId,
		/** @var Collection<int, Issue> */
		public Optional|Collection $issues,
		public Optional|bool $success
	) {
	}
}
