<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\NotificationSubscription;
class NotificationSubscriptionEdge extends Data
{
    function __construct(public Optional|NotificationSubscription $node, public Optional|string $cursor)
    {
    }
}
