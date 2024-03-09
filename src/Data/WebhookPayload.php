<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data, Spatie\LaravelData\Optional, Glhd\Linearavel\Data\Webhook;
class WebhookPayload extends Data
{
    function __construct(public Optional|float $lastSyncId, public Optional|Webhook $webhook, public Optional|bool $success)
    {
    }
}
