<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\NotificationEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Notification, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class NotificationConnection extends Data
{
    function __construct(
        /** @var Collection<int, NotificationEdge> */
        public Collection $edges,
        /** @var Collection<int, Notification> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
