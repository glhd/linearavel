<?php

namespace Glhd\Linearavel\Data;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/RateLimitPayload */
class RateLimitPayload extends Data
{
	public function __construct(
		public Optional|string $kind,
		/** @var Collection<int, RateLimitResultPayload> */
		public Optional|Collection $limits,
		public Optional|string|null $identifier
	) {
	}
}
