<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/NotificationSubscriptionEdge */
class NotificationSubscriptionEdge extends Data
{
	public function __construct(public Optional|NotificationSubscription $node, public Optional|string $cursor)
	{
	}
}
