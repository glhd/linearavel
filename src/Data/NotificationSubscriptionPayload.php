<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\NotificationSubscription;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationSubscriptionPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|NotificationSubscription $notificationSubscription, public Optional|bool $success)
	{
	}
}
