<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\Notification;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationPayload extends Data
{
	public function __construct(public Optional|float $lastSyncId, public Optional|Notification $notification, public Optional|bool $success)
	{
	}
}
