<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Notification;
class NotificationEdge extends Data
{
    function __construct(public Optional|Notification $node, public Optional|string $cursor)
    {
    }
}
