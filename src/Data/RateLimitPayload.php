<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class RateLimitPayload extends Data
{
	public Optional|string|null $identifier = null
        
	function __construct(
		public Optional|string $kind,
		/** @var Collection<int, RateLimitResultPayload> */
		public Optional|Collection $limits,
	) {
	}
}
