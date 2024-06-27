<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/NotificationSubscriptionPayload */
class NotificationSubscriptionPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|NotificationSubscription $notificationSubscription, public Optional|bool $success)
	{
	}
}
