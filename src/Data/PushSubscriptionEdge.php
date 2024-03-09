<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PushSubscriptionEdge extends Data
{
	function __construct(public Optional|PushSubscription $node, public Optional|string $cursor)
	{
	}
}
