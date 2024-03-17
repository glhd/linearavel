<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class WebhookEdge extends Data
{
	public function __construct(public Optional|Webhook $node, public Optional|string $cursor)
	{
	}
}
