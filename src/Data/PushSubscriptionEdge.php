<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PushSubscription;
class PushSubscriptionEdge extends Data
{
    function __construct(public Optional|PushSubscription $node, public Optional|string $cursor)
    {
    }
}
