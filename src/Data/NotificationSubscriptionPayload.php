<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\NotificationSubscription;
class NotificationSubscriptionPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|NotificationSubscription $notificationSubscription, public Optional|bool $success)
    {
    }
}
