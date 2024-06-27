<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\Notification;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/NotificationEdge */
class NotificationEdge extends Data
{
	public function __construct(public Optional|Notification $node, public Optional|string $cursor)
	{
	}
}
