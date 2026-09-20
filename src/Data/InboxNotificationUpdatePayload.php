<?php

namespace Glhd\Linearavel\Data;

use Glhd\Linearavel\Data\Contracts\Notification;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumerableCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

/** @see https://studio.apollographql.com/public/Linear-API/variant/current/schema/reference/objects/InboxNotificationUpdatePayload */
class InboxNotificationUpdatePayload extends Data
{
	public function __construct(
		public Optional|float $lastSyncId,
		public Optional|Notification $notification,
		/** @var Collection<int, Notification> */
		#[WithCast(EnumerableCast::class)]
		public Optional|Collection $updatedNotifications,
		public Optional|bool $success
	) {
	}
}
