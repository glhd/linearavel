<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Notification, Illuminate\Support\Collection;
class NotificationBatchActionPayload extends Data
{
    function __construct(
        public Optional|float $lastSyncId,
        /** @var Collection<int, Notification> */
        public Optional|Collection $notifications,
        public Optional|bool $success
    )
    {
    }
}
