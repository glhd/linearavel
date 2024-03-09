<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationSubscriptionEdge extends Data
{
	function __construct(public Optional|NotificationSubscription $node, public Optional|string $cursor)
	{
	}
}