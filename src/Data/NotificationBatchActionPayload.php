<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\Notification;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/NotificationBatchActionPayload */
class NotificationBatchActionPayload extends Data
{
	public function __construct(
		public Optional|float $lastSyncId,
		/** @var Collection<int, Notification> */
		public Optional|Collection $notifications,
		public Optional|bool $success
	) {
	}
}
