<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\Notification;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class NotificationBatchActionPayload extends Data
{
	function __construct(
		public Optional|float $lastSyncId,
		/** @var Collection<int, Notification> */
		public Optional|Collection $notifications,
		public Optional|bool $success
	) {
	}
}
