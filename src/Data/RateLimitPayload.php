<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\RateLimitResultPayload, Illuminate\Support\Collection;
class RateLimitPayload extends Data
{
    function __construct(
        public Optional|string|null $identifier,
        public Optional|string $kind,
        /** @var Collection<int, RateLimitResultPayload> */
        public Collection $limits
    )
    {
    }
}
