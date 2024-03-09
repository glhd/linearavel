<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PushSubscription;
class PushSubscriptionPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|PushSubscription $entity, public Optional|bool $success)
    {
    }
}
