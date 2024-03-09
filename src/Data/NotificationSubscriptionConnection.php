<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\NotificationSubscriptionEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\NotificationSubscription, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class NotificationSubscriptionConnection extends Data
{
    function __construct(
        /** @var Collection<int, NotificationSubscriptionEdge> */
        public Optional|Collection $edges,
        /** @var Collection<int, NotificationSubscription> */
        public Optional|Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
