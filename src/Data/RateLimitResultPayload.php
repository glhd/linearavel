<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional;
class RateLimitResultPayload extends Data
{
    function __construct(public Optional|string $type, public Optional|float $requestedAmount, public Optional|float $allowedAmount, public Optional|float $period, public Optional|float $remainingAmount, public Optional|float $reset)
    {
    }
}
