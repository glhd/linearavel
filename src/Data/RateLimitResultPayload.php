<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RateLimitResultPayload extends Data
{
	public function __construct(
		public Optional|string $type,
		public Optional|float $requestedAmount,
		public Optional|float $allowedAmount,
		public Optional|float $period,
		public Optional|float $remainingAmount,
		public Optional|float $reset
	) {
	}
}
