<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\ApiKey;
class ApiKeyPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|ApiKey $apiKey, public Optional|bool $success)
    {
    }
}
