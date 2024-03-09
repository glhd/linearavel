<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Notification;
class NotificationPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Notification $notification, public Optional|bool $success)
    {
    }
}
