<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WebhookPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|Webhook $webhook, public Optional|bool $success)
	{
	}
}
