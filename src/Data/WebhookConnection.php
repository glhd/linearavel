<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Glhd\Linearavel\Data\WebhookEdge, Illuminate\Support\Collection, Glhd\Linearavel\Data\Webhook, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\PageInfo;
class WebhookConnection extends Data
{
    function __construct(
        /** @var Collection<int, WebhookEdge> */
        public Collection $edges,
        /** @var Collection<int, Webhook> */
        public Collection $nodes,
        public Optional|PageInfo $pageInfo
    )
    {
    }
}
