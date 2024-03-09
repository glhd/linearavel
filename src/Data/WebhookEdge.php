<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Webhook;
class WebhookEdge extends Data
{
    function __construct(public Optional|Webhook $node, public Optional|string $cursor)
    {
    }
}
