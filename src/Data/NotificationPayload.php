<?php

namespace Glhd\Linearavel\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationPayload extends Data
{
	function __construct(public Optional|float $lastSyncId, public Optional|Notification $notification, public Optional|bool $success)
	{
	}
}