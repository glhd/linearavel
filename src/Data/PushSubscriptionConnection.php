<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\PushSubscriptionEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\PushSubscription, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class PushSubscriptionConnection extends Data
{
    function __construct(
        /** @var Collection<int, PushSubscriptionEdge> */
        public Collection $edges,
        /** @var Collection<int, PushSubscription> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
